<?php

// src/Services/JLPParser.php

namespace App\Services;

use App\Entity\Images;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use \Symfony\Component\Yaml\Yaml;
use Symfony\Component\Console\Helper\ProgressBar;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
* Service Parser
* 
* @author      Jean-Baptiste CIEPKA
* @version     1.0
*
*/
class JLPParser
{
    /**
     * @var EntityManagerInterface
     */
    protected $oEm;
  
    /**
     * @var \SimpleXMLElement
     */
    protected $oXml;
  
    /**
     * @var LoggerInterface
     */
    protected $oLogger;
  
    /**
     * @var YamlConfig
     */
    protected $oYmlMapping;
  
    /**
     * @var ProgressBar
     */
    protected $oProgressBar;
    
    /*Agence Variables*/
    protected $aAgenceInfo = array();
    protected $oAgenceEntity = null;
    protected $aYmlAgenceMapping = array();
  
    /*Negociateur Variables*/
    protected $aNegociateurInfo = array();
    protected $oNegociateurEntity = null;
    protected $aYmlNegociateurMapping = array();
  
    /*Annonce Variables*/
    protected $aAnnonceInfo = array();
    protected $oAnnonceEntity = null;
    protected $aYmlAnnonceMapping = array();
  
    /*TypeBien Variables*/
    protected $oTypeBienEntity = null;
  
    /*TypeMandat Variables*/
    protected $oTypeMandatEntity = null;
  
    /*Counts */
    public $iNbAnnonceTraite = 0;
  
  
    // On injecte l'EntityManager
    public function __construct(EntityManagerInterface $oEm, LoggerInterface $oLogger, $sYmlConfigFile)
    {
    $this->oEm = $oEm;
    $this->oLogger = $oLogger;
    $this->oYmlMapping = Yaml::parse(file_get_contents($sYmlConfigFile));
       
    }
  
    /**
     * execute
     * 
     * Method lauching the process.
     *
     * @param string $sXMLFileName
     * @param LoggerInterface $logger
     *
     * @return boolean
     */  
    public function execute($sXMLFileName, $logger, $oProgressbar)
    {
    $this->oLogger = $logger;
    $this->oXml = simplexml_load_file($sXMLFileName);
    $this->oLogger->info("Execute JLPParser");
    $sMainNodeName = $this->oYmlMapping['passerelle']['xml_annonce_node'];
        
    $this->oProgressBar = $oProgressbar;
    $this->oProgressBar->setMessage('Parsing the annonces ...');
    $this->oProgressBar->start(count($this->oXml->{$sMainNodeName}));
    foreach ($this->oXml->{$sMainNodeName} as $oNode)
    {
        /*Traitement préliminaire du XML*/
        $this->oProgressBar->advance();
        $this->prepareMappedKey($oNode);
      
        $this->prepareTypeField($oNode);
      
        $this->prepareMappedFields($oNode);

        /* Persisting the entities*/
        $this->oAnnonceEntity->setStatusAnnonce("active");
        $this->persistAndFlushEntitites();
        
        $this->deleteImageFromAnnonce($oNode);
        $this->extractImageFromAnnonce($oNode);
      
    }
    $this->oProgressBar->finish();
    return true; 
    } 
  
    /**
     * prepareMappedKey
     * 
     * Method initializing the Entitites by their primary key and creating new one if the id is not found.
     *  
     * @param \SimpleXMLElement  $oNode
     */
    private function prepareMappedKey(\SimpleXMLElement $oNode)
    {
    $aXmlMappedKey = $this->oYmlMapping['passerelle']['keys_parser'];
    foreach ($aXmlMappedKey as $sKeyName => $aKeyInfos)  
    {
        $sEntityObjectName = 'o'.$aKeyInfos['entity']."Entity";

        $oObjectName = $this->oEm->getRepository('AdminBundle:'.$aKeyInfos['entity'])
                                ->findOneBy(array($aKeyInfos['field']=>$oNode->$sKeyName->__toString()));
        if (!empty($oObjectName)) {
            $this->$sEntityObjectName = $oObjectName;
        } else {
            $sEntityClassName = 'App\Entity\\'.$aKeyInfos['entity'];
            $this->$sEntityObjectName = new $sEntityClassName;
            $sSetFunc = 'set'.ucfirst($aKeyInfos['field']);

            $this->$sEntityObjectName->$sSetFunc($oNode->{$sKeyName}->__toString());
        }
        unset($sEntityObjectName, $sSetFunc, $oObjectName);
    }
    }
  
    /**
     * prepareTypeField
     * 
     * Method initializing the Annocne's Sub-Entitites by their primary key and creating new one if the id is not found.
     *  
     * @param \SimpleXMLElement  $oNode
     */
    private function prepareTypeField(\SimpleXMLElement $oNode)
    {
    $aXmlTypeFields = $this->oYmlMapping['passerelle']['type_fields'];
    foreach ($aXmlTypeFields as $sFieldName => $aFieldInfos)  
    { 
        $sEntityObjectName = 'o'.$aFieldInfos['parent_entity']."Entity";
        $oTypeEntity = $this->oEm->getRepository('AdminBundle:'.$aFieldInfos['entity'])
                                ->findOneBy(array("type"=>strtolower($oNode->{$sFieldName}->__toString())));
        if (!empty($oTypeEntity))
        {
        $sSetFunc = 'set'.ucfirst($aFieldInfos['field']);
        $this->$sEntityObjectName->$sSetFunc($oTypeEntity);
        } else {
        $sEntityTypeClassName = 'App\Entity\\'.$aFieldInfos['entity'];
        $oTypeEntity = new $sEntityTypeClassName;
        $oTypeEntity->setType(strtolower($oNode->{$sFieldName}->__toString()));
        $this->oEm->persist($oTypeEntity);
        $sSetFunc = 'set'.ucfirst($aFieldInfos['field']);
        $this->$sEntityObjectName->$sSetFunc($oTypeEntity);
        }
        unset($sEntityObjectName, $sSetFunc, $oTypeEntity);
    }
    }
  
    /**
     * prepareMappedFields
     * 
     * Method fetching the value for each entity field from the xml following the mapping given in conf. 
     *  
     * @param \SimpleXMLElement  $oNode
     */
    private function prepareMappedFields(\SimpleXMLElement $oNode)
    {
    $aXmlMappedFields = $this->oYmlMapping['passerelle']['parser'];
    foreach ($aXmlMappedFields as $sFieldName => $aFieldInfos)  
    { 
        $sEntityObjectName = 'o'.$aFieldInfos['entity']."Entity";
        $sSetFunc = 'set'.ucfirst($aFieldInfos['field']);
        if (true === isset($aFieldInfos['date']) && true === $aFieldInfos['date'])
        {

        $sDateFormat = isset($aFieldInfos['date_format']) ? $aFieldInfos['date_format'] : 'j/m/Y';

        $oDate = $this->cleanDateFormat($sDateFormat, $oNode->{$sFieldName}->__toString());   
        $this->$sEntityObjectName->$sSetFunc($oDate);
        } else {
        $this->$sEntityObjectName->$sSetFunc($oNode->{$sFieldName}->__toString());
        }
        unset($sEntityObjectName, $sSetFunc, $sDateFormat, $oDate);
    }
    }
  
    /**
     * cleanDateFormat
     * 
     * Method returning a Datatime object from a date with a specific format. 
     *  
     * @param string  $sDateFormat
     * @param string  $date
     *
     * @return \Datetime 
     */
    private function cleanDateFormat($sDateFormat, $date)
    {
    $oDate = \DateTime::createFromFormat($sDateFormat, $date);
    
    return $oDate;
    }
  
    /**
     * persistAndFlushEntitites
     * 
     * Method cascading the persits of every entities updated during the process of one annonce. 
     *  
     * @param void
     */
    private function persistAndFlushEntitites()
    {
        $this->oEm->getClassMetaData(get_class($this->oAgenceEntity))->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
        $this->oEm->getClassMetaData(get_class($this->oNegociateurEntity))->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
        $this->oEm->getClassMetaData(get_class($this->oAnnonceEntity))->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $this->oEm->persist($this->oAgenceEntity);
        $this->oNegociateurEntity->setAgence($this->oAgenceEntity);
        $this->oEm->persist($this->oNegociateurEntity);
        $this->oAnnonceEntity->setAgence($this->oAgenceEntity);
        $this->oAnnonceEntity->setNegociateur($this->oNegociateurEntity);

        $this->oEm->persist($this->oAnnonceEntity);

        $this->oEm->flush();
        $this->iNbAnnonceTraite++;
    } 
  
    /**
     * deleteImageFromAnnonce
     * 
     * Method deleting the existing images of the annonce.
     *  
     * @param \SimpleXMLElement $oNode
     */
    private function deleteImageFromAnnonce(\SimpleXMLElement $oNode)
    {
    $iIdAnnonce = $oNode->{$this->oYmlMapping['passerelle']['xml_annonce_key']}->__toString();
    
    $oAnnonceEntity = $this->oEm->getRepository('AdminBundle:Annonce')->findOneBy(array('id'=>$iIdAnnonce));
    
    $aImagesCollection = $oAnnonceEntity->getImages();
    
    
    
    if (!empty($aImagesCollection))
    {
        foreach ($aImagesCollection as $oAnnonceImages)
        {
        $this->oEm->remove($oAnnonceImages);
        }
        $this->oEm->flush();
    }

    }
   
    /**
     * extractImageFromAnnonce
     * 
     * Method inserting the images of each annonce in the bdd. 
     *  
     * @param \SimpleXMLElement $oNode
     */
    private function extractImageFromAnnonce(\SimpleXMLElement $oNode)
    {
    $aAnnonceImages = $oNode->{$this->oYmlMapping['passerelle']['xml_images_node']};
    
    $iIdAnnonce = $oNode->{$this->oYmlMapping['passerelle']['xml_annonce_key']}->__toString();
    
    $oAnnonceEntity = $this->oEm->getRepository('AdminBundle:Annonce')->findOneBy(array('id'=>$iIdAnnonce));
    
    foreach ($aAnnonceImages->{'photo'} as $oImageName)
    {
        $sImageName = $oImageName->__toString();
        $oImageEntity = new Images();
        $oImageEntity->setFileName($sImageName);
        $oImageEntity->setAnnonce($oAnnonceEntity);
        $this->oEm->persist($oImageEntity);

    }

    $this->oEm->flush();
    
    }
  
    public function getNbAnnonceTraite()
    {
    return $this->iNbAnnonceTraite;
    }
  
    public function getName()
    {
        return 'jlp_core.parser';
    }
  
}
