<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Entity;
/**
 * Annonce
 * 
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 * @ApiResource()
 */
class Annonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** 
     * @ORM\ManyToOne(targetEntity="App\Entity\Agence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Negociateur", inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $negociateur;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProgrammeNeuf", inversedBy="annonces")
     * @ORM\JoinColumn(nullable=true)
     */
    private $programmeNeuf;
        
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="annonce")
     */
    private $images; // Notez le « s », une annonce est liée à plusieurs candidatures
    
    /**
     * @var string
     *
     * @ORM\Column(name="statusAnnonce", type="string", length=255)
     */
    private $statusAnnonce;

    /**
     * @var integer
     * 
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var integer
     * 
     * @ORM\Column(name="numMandat", type="string", length=255)
     */
    private $numMandat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeMandat", cascade={"persist"})
     */
    private $typeMandat;

    /**
     * @var integer
     * 
     * @ORM\Column(name="categorieOffre", type="string", length=255)
     */
    private $categorieOffre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeBien", cascade={"persist"})
     */
    private $typeBien;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDebutMandat", type="string", length=255)
     */
    private $dateDebutMandat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateEcheanceMandat", type="string", length=255)
     */
    private $dateEcheanceMandat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDisponibiliteOuLiberation", type="string", length=255)
     */
    private $dateDisponibiliteOuLiberation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     * 
     * @ORM\Column(name="codePostalPublic", type="integer")
     */
    private $codePostalPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="villePublique", type="string", length=255)
     */
    private $villePublique;

    /**
     * @var string
     *
     * @ORM\Column(name="villeAAfficher", type="string", length=255)
     */
    private $villeAAfficher;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="quartier", type="string", length=255)
     */
    private $quartier;

    /**
     * @var string
     *
     * @ORM\Column(name="environnement", type="string", length=255)
     */
    private $environnement;

    /**
     * @var string
     *
     * @ORM\Column(name="proximite", type="string", length=255)
     */
    private $proximite;

    /**
     * @var string
     *
     * @ORM\Column(name="transports", type="string", length=255)
     */
    private $transports;

    /**
     * @var integer
     * 
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var integer
     * 
     * @ORM\Column(name="charges", type="integer")
     */
    private $charges;

    /**
     * @var integer
     * 
     * @ORM\Column(name="loyer", type="integer")
     */
    private $loyer;

    /**
     * @var integer
     * 
     * @ORM\Column(name="depotGarantie", type="integer")
     */
    private $depotGarantie;

    /**
     * @var integer
     * 
     * @ORM\Column(name="fraisDivers", type="integer")
     */
    private $fraisDivers;

    /**
     * @var integer
     * 
     * @ORM\Column(name="loyerGarage", type="integer")
     */
    private $loyerGarage;

    /**
     * @var integer
     * 
     * @ORM\Column(name="ageTete", type="integer")
     */
    private $ageTete;

    /**
     * @var string
     *
     * @ORM\Column(name="typeRente", type="string", length=255)
     */
    private $typeRente;

    /**
     * @var integer
     * 
     * @ORM\Column(name="taxeHabitation", type="integer")
     */
    private $taxeHabitation;

    /**
     * @var integer
     * 
     * @ORM\Column(name="taxeFonciere", type="integer")
     */
    private $taxeFonciere;

    /**
     * @var integer
     * 
     * @ORM\Column(name="fraisDeNotaireReduits", type="integer")
     */
    private $fraisDeNotaireReduits;

    /**
     * @var integer
     * 
     * @ORM\Column(name="pieces", type="integer")
     */
    private $pieces;

    /**
     * @var integer
     * 
     * @ORM\Column(name="chambres", type="integer")
     */
    private $chambres;

    /**
     * @var integer
     * 
     * @ORM\Column(name="sdb", type="integer")
     */
    private $sdb;

    /**
     * @var integer
     * 
     * @ORM\Column(name="nbSallesDEau", type="integer")
     */
    private $nbSallesDEau;

    /**
     * @var integer
     * 
     * @ORM\Column(name="nbWc", type="integer")
     */
    private $nbWc;

    /**
     * @var integer
     * 
     * @ORM\Column(name="nbParking", type="integer")
     */
    private $nbParking;

    /**
     * @var integer
     * 
     * @ORM\Column(name="nbGarages", type="integer")
     */
    private $nbGarages;

    /**
     * @var integer
     * 
     * @ORM\Column(name="niveaux", type="integer")
     */
    private $niveaux;

    /**
     * @var integer
     * 
     * @ORM\Column(name="nbEtages", type="integer")
     */
    private $nbEtages;

    /**
     * @var integer
     * 
     * @ORM\Column(name="etage", type="integer")
     */
    private $etage;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surfaceCarrezOuHabitable", type="integer")
     */
    private $surfaceCarrezOuHabitable;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surfaceTerrain", type="integer")
     */
    private $surfaceTerrain;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surfaceSejour", type="integer")
     */
    private $surfaceSejour;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surfaceTerrasse", type="integer")
     */
    private $surfaceTerrasse;

    /**
     * @var integer
     * 
     * @ORM\Column(name="surfaceBalcon", type="integer")
     */
    private $surfaceBalcon;

    /**
     * @var integer
     * 
     * @ORM\Column(name="accesHandicape", type="integer")
     */
    private $accesHandicape;

    /**
     * @var integer
     * 
     * @ORM\Column(name="alarme", type="integer")
     */
    private $alarme;

    /**
     * @var integer
     * 
     * @ORM\Column(name="ascenseur", type="integer")
     */
    private $ascenseur;

    /**
     * @var integer
     * 
     * @ORM\Column(name="balcon", type="integer")
     */
    private $balcon;

    /**
     * @var integer
     * 
     * @ORM\Column(name="bureau", type="integer")
     */
    private $bureau;

    /**
     * @var integer
     * 
     * @ORM\Column(name="cave", type="integer")
     */
    private $cave;

    /**
     * @var integer
     * 
     * @ORM\Column(name="cellier", type="integer")
     */
    private $cellier;

    /**
     * @var integer
     * 
     * @ORM\Column(name="dependances", type="integer")
     */
    private $dependances;

    /**
     * @var integer
     * 
     * @ORM\Column(name="dressing", type="integer")
     */
    private $dressing;

    /**
     * @var integer
     * 
     * @ORM\Column(name="gardien", type="integer")
     */
    private $gardien;

    /**
     * @var integer
     * 
     * @ORM\Column(name="interphone", type="integer")
     */
    private $interphone;

    /**
     * @var integer
     * 
     * @ORM\Column(name="lotissement", type="integer")
     */
    private $lotissement;

    /**
     * @var integer
     * 
     * @ORM\Column(name="meuble", type="integer")
     */
    private $meuble;

    /**
     * @var integer
     * 
     * @ORM\Column(name="mitoyenne", type="integer")
     */
    private $mitoyenne;

    /**
     * @var integer
     * 
     * @ORM\Column(name="piscine", type="integer")
     */
    private $piscine;

    /**
     * @var integer
     * 
     * @ORM\Column(name="terrasse", type="integer")
     */
    private $terrasse;

    /**
     * @var string
     *
     * @ORM\Column(name="anciennete", type="string", length=255)
     */
    private $anciennete;

    /**
     * @var integer
     * 
     * @ORM\Column(name="anneeConstruction", type="integer")
     */
    private $anneeConstruction;

    /**
     * @var integer
     * 
     * @ORM\Column(name="exposition", type="integer")
     */
    private $exposition;

    /**
     * @var string
     *
     * @ORM\Column(name="typeChauffage", type="string", length=255)
     */
    private $typeChauffage;

    /**
     * @var string
     *
     * @ORM\Column(name="natureChauffage", type="string", length=255)
     */
    private $natureChauffage;

    /**
     * @var string
     *
     * @ORM\Column(name="modeChauffage", type="string", length=255)
     */
    private $modeChauffage;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCuisine", type="string", length=255)
     */
    private $typeCuisine;

    /**
     * @ORM\Column(name="coupDeCoeur", type="integer")
     */
    private $coupDeCoeur;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="textAnglais", type="text")
     */
    private $textAnglais;

    /**
     * @var string
     *
     * @ORM\Column(name="urlVisiteVirtuelle", type="string", length=255)
     */
    private $urlVisiteVirtuelle;

    /**
     * @var integer
     * 
     * @ORM\Column(name="consommationEnergie", type="integer")
     */
    private $consommationEnergie;

    /**
     * @var integer
     * 
     * @ORM\Column(name="emissionGes", type="integer")
     */
    private $emissionGes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param int $id
     * @return Annonce
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set statusAnnonce
     *
     * @param string $statusAnnonce
     *
     * @return Annonce
     */
    public function setStatusAnnonce($statusAnnonce)
    {
        $this->statusAnnonce = $statusAnnonce;

        return $this;
    }

    /**
     * Get statusAnnonce
     *
     * @return string
     */
    public function getStatusAnnonce()
    {
        return $this->statusAnnonce;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Annonce
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set numMandat
     *
     * @param string $numMandat
     *
     * @return Annonce
     */
    public function setNumMandat($numMandat)
    {
        $this->numMandat = $numMandat;

        return $this;
    }

    /**
     * Get numMandat
     *
     * @return integer
     */
    public function getNumMandat()
    {
        return $this->numMandat;
    }

    /**
     * Set categorieOffre
     *
     * @param string $categorieOffre
     *
     * @return Annonce
     */
    public function setCategorieOffre($categorieOffre)
    {
        $this->categorieOffre = $categorieOffre;

        return $this;
    }

    /**
     * Get categorieOffre
     *
     * @return integer
     */
    public function getCategorieOffre()
    {
        return $this->categorieOffre;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Annonce
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Annonce
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return Annonce
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set dateDebutMandat
     *
     * @param string $dateDebutMandat
     *
     * @return Annonce
     */
    public function setDateDebutMandat($dateDebutMandat)
    {
        $this->dateDebutMandat = $dateDebutMandat;

        return $this;
    }

    /**
     * Get dateDebutMandat
     *
     * @return string
     */
    public function getDateDebutMandat()
    {
        return $this->dateDebutMandat;
    }

    /**
     * Set dateEcheanceMandat
     *
     * @param string $dateEcheanceMandat
     *
     * @return Annonce
     */
    public function setDateEcheanceMandat($dateEcheanceMandat)
    {
        $this->dateEcheanceMandat = $dateEcheanceMandat;

        return $this;
    }

    /**
     * Get dateEcheanceMandat
     *
     * @return string
     */
    public function getDateEcheanceMandat()
    {
        return $this->dateEcheanceMandat;
    }

    /**
     * Set dateDisponibiliteOuLiberation
     *
     * @param string $dateDisponibiliteOuLiberation
     *
     * @return Annonce
     */
    public function setDateDisponibiliteOuLiberation($dateDisponibiliteOuLiberation)
    {
        $this->dateDisponibiliteOuLiberation = $dateDisponibiliteOuLiberation;

        return $this;
    }

    /**
     * Get dateDisponibiliteOuLiberation
     *
     * @return string
     */
    public function getDateDisponibiliteOuLiberation()
    {
        return $this->dateDisponibiliteOuLiberation;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Annonce
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostalPublic
     *
     * @param integer $codePostalPublic
     *
     * @return Annonce
     */
    public function setCodePostalPublic($codePostalPublic)
    {
        $this->codePostalPublic = $codePostalPublic;

        return $this;
    }

    /**
     * Get codePostalPublic
     *
     * @return integer
     */
    public function getCodePostalPublic()
    {
        return $this->codePostalPublic;
    }

    /**
     * Set villePublique
     *
     * @param string $villePublique
     *
     * @return Annonce
     */
    public function setVillePublique($villePublique)
    {
        $this->villePublique = $villePublique;

        return $this;
    }

    /**
     * Get villePublique
     *
     * @return string
     */
    public function getVillePublique()
    {
        return $this->villePublique;
    }

    /**
     * Set villeAAfficher
     *
     * @param string $villeAAfficher
     *
     * @return Annonce
     */
    public function setVilleAAfficher($villeAAfficher)
    {
        $this->villeAAfficher = $villeAAfficher;

        return $this;
    }

    /**
     * Get villeAAfficher
     *
     * @return string
     */
    public function getVilleAAfficher()
    {
        return $this->villeAAfficher;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Annonce
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set quartier
     *
     * @param string $quartier
     *
     * @return Annonce
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return string
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * Set environnement
     *
     * @param string $environnement
     *
     * @return Annonce
     */
    public function setEnvironnement($environnement)
    {
        $this->environnement = $environnement;

        return $this;
    }

    /**
     * Get environnement
     *
     * @return string
     */
    public function getEnvironnement()
    {
        return $this->environnement;
    }

    /**
     * Set proximite
     *
     * @param string $proximite
     *
     * @return Annonce
     */
    public function setProximite($proximite)
    {
        $this->proximite = $proximite;

        return $this;
    }

    /**
     * Get proximite
     *
     * @return string
     */
    public function getProximite()
    {
        return $this->proximite;
    }

    /**
     * Set transports
     *
     * @param string $transports
     *
     * @return Annonce
     */
    public function setTransports($transports)
    {
        $this->transports = $transports;

        return $this;
    }

    /**
     * Get transports
     *
     * @return string
     */
    public function getTransports()
    {
        return $this->transports;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Annonce
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set charges
     *
     * @param integer $charges
     *
     * @return Annonce
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return integer
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set loyer
     *
     * @param integer $loyer
     *
     * @return Annonce
     */
    public function setLoyer($loyer)
    {
        $this->loyer = $loyer;

        return $this;
    }

    /**
     * Get loyer
     *
     * @return integer
     */
    public function getLoyer()
    {
        return $this->loyer;
    }

    /**
     * Set depotGarantie
     *
     * @param integer $depotGarantie
     *
     * @return Annonce
     */
    public function setDepotGarantie($depotGarantie)
    {
        $this->depotGarantie = $depotGarantie;

        return $this;
    }

    /**
     * Get depotGarantie
     *
     * @return integer
     */
    public function getDepotGarantie()
    {
        return $this->depotGarantie;
    }

    /**
     * Set fraisDivers
     *
     * @param integer $fraisDivers
     *
     * @return Annonce
     */
    public function setFraisDivers($fraisDivers)
    {
        $this->fraisDivers = $fraisDivers;

        return $this;
    }

    /**
     * Get fraisDivers
     *
     * @return integer
     */
    public function getFraisDivers()
    {
        return $this->fraisDivers;
    }

    /**
     * Set loyerGarage
     *
     * @param integer $loyerGarage
     *
     * @return Annonce
     */
    public function setLoyerGarage($loyerGarage)
    {
        $this->loyerGarage = $loyerGarage;

        return $this;
    }

    /**
     * Get loyerGarage
     *
     * @return integer
     */
    public function getLoyerGarage()
    {
        return $this->loyerGarage;
    }

    /**
     * Set ageTete
     *
     * @param integer $ageTete
     *
     * @return Annonce
     */
    public function setAgeTete($ageTete)
    {
        $this->ageTete = $ageTete;

        return $this;
    }

    /**
     * Get ageTete
     *
     * @return integer
     */
    public function getAgeTete()
    {
        return $this->ageTete;
    }

    /**
     * Set typeRente
     *
     * @param string $typeRente
     *
     * @return Annonce
     */
    public function setTypeRente($typeRente)
    {
        $this->typeRente = $typeRente;

        return $this;
    }

    /**
     * Get typeRente
     *
     * @return string
     */
    public function getTypeRente()
    {
        return $this->typeRente;
    }

    /**
     * Set taxeHabitation
     *
     * @param integer $taxeHabitation
     *
     * @return Annonce
     */
    public function setTaxeHabitation($taxeHabitation)
    {
        $this->taxeHabitation = $taxeHabitation;

        return $this;
    }

    /**
     * Get taxeHabitation
     *
     * @return integer
     */
    public function getTaxeHabitation()
    {
        return $this->taxeHabitation;
    }

    /**
     * Set taxeFonciere
     *
     * @param integer $taxeFonciere
     *
     * @return Annonce
     */
    public function setTaxeFonciere($taxeFonciere)
    {
        $this->taxeFonciere = $taxeFonciere;

        return $this;
    }

    /**
     * Get taxeFonciere
     *
     * @return integer
     */
    public function getTaxeFonciere()
    {
        return $this->taxeFonciere;
    }

    /**
     * Set fraisDeNotaireReduits
     *
     * @param integer $fraisDeNotaireReduits
     *
     * @return Annonce
     */
    public function setFraisDeNotaireReduits($fraisDeNotaireReduits)
    {
        $this->fraisDeNotaireReduits = $fraisDeNotaireReduits;

        return $this;
    }

    /**
     * Get fraisDeNotaireReduits
     *
     * @return integer
     */
    public function getFraisDeNotaireReduits()
    {
        return $this->fraisDeNotaireReduits;
    }

    /**
     * Set pieces
     *
     * @param integer $pieces
     *
     * @return Annonce
     */
    public function setPieces($pieces)
    {
        $this->pieces = $pieces;

        return $this;
    }

    /**
     * Get pieces
     *
     * @return integer
     */
    public function getPieces()
    {
        return $this->pieces;
    }

    /**
     * Set chambres
     *
     * @param integer $chambres
     *
     * @return Annonce
     */
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;

        return $this;
    }

    /**
     * Get chambres
     *
     * @return integer
     */
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * Set sdb
     *
     * @param integer $sdb
     *
     * @return Annonce
     */
    public function setSdb($sdb)
    {
        $this->sdb = $sdb;

        return $this;
    }

    /**
     * Get sdb
     *
     * @return integer
     */
    public function getSdb()
    {
        return $this->sdb;
    }

    /**
     * Set nbSallesDEau
     *
     * @param integer $nbSallesDEau
     *
     * @return Annonce
     */
    public function setNbSallesDEau($nbSallesDEau)
    {
        $this->nbSallesDEau = $nbSallesDEau;

        return $this;
    }

    /**
     * Get nbSallesDEau
     *
     * @return integer
     */
    public function getNbSallesDEau()
    {
        return $this->nbSallesDEau;
    }

    /**
     * Set nbWc
     *
     * @param integer $nbWc
     *
     * @return Annonce
     */
    public function setNbWc($nbWc)
    {
        $this->nbWc = $nbWc;

        return $this;
    }

    /**
     * Get nbWc
     *
     * @return integer
     */
    public function getNbWc()
    {
        return $this->nbWc;
    }

    /**
     * Set nbParking
     *
     * @param integer $nbParking
     *
     * @return Annonce
     */
    public function setNbParking($nbParking)
    {
        $this->nbParking = $nbParking;

        return $this;
    }

    /**
     * Get nbParking
     *
     * @return integer
     */
    public function getNbParking()
    {
        return $this->nbParking;
    }

    /**
     * Set nbGarages
     *
     * @param integer $nbGarages
     *
     * @return Annonce
     */
    public function setNbGarages($nbGarages)
    {
        $this->nbGarages = $nbGarages;

        return $this;
    }

    /**
     * Get nbGarages
     *
     * @return integer
     */
    public function getNbGarages()
    {
        return $this->nbGarages;
    }

    /**
     * Set niveaux
     *
     * @param integer $niveaux
     *
     * @return Annonce
     */
    public function setNiveaux($niveaux)
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    /**
     * Get niveaux
     *
     * @return integer
     */
    public function getNiveaux()
    {
        return $this->niveaux;
    }

    /**
     * Set nbEtages
     *
     * @param integer $nbEtages
     *
     * @return Annonce
     */
    public function setNbEtages($nbEtages)
    {
        $this->nbEtages = $nbEtages;

        return $this;
    }

    /**
     * Get nbEtages
     *
     * @return integer
     */
    public function getNbEtages()
    {
        return $this->nbEtages;
    }

    /**
     * Set etage
     *
     * @param integer $etage
     *
     * @return Annonce
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage
     *
     * @return integer
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     *
     * @return Annonce
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return integer
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set surfaceCarrezOuHabitable
     *
     * @param integer $surfaceCarrezOuHabitable
     *
     * @return Annonce
     */
    public function setSurfaceCarrezOuHabitable($surfaceCarrezOuHabitable)
    {
        $this->surfaceCarrezOuHabitable = $surfaceCarrezOuHabitable;

        return $this;
    }

    /**
     * Get surfaceCarrezOuHabitable
     *
     * @return integer
     */
    public function getSurfaceCarrezOuHabitable()
    {
        return $this->surfaceCarrezOuHabitable;
    }

    /**
     * Set surfaceTerrain
     *
     * @param integer $surfaceTerrain
     *
     * @return Annonce
     */
    public function setSurfaceTerrain($surfaceTerrain)
    {
        $this->surfaceTerrain = $surfaceTerrain;

        return $this;
    }

    /**
     * Get surfaceTerrain
     *
     * @return integer
     */
    public function getSurfaceTerrain()
    {
        return $this->surfaceTerrain;
    }

    /**
     * Set surfaceSejour
     *
     * @param integer $surfaceSejour
     *
     * @return Annonce
     */
    public function setSurfaceSejour($surfaceSejour)
    {
        $this->surfaceSejour = $surfaceSejour;

        return $this;
    }

    /**
     * Get surfaceSejour
     *
     * @return integer
     */
    public function getSurfaceSejour()
    {
        return $this->surfaceSejour;
    }

    /**
     * Set surfaceTerrasse
     *
     * @param integer $surfaceTerrasse
     *
     * @return Annonce
     */
    public function setSurfaceTerrasse($surfaceTerrasse)
    {
        $this->surfaceTerrasse = $surfaceTerrasse;

        return $this;
    }

    /**
     * Get surfaceTerrasse
     *
     * @return integer
     */
    public function getSurfaceTerrasse()
    {
        return $this->surfaceTerrasse;
    }

    /**
     * Set surfaceBalcon
     *
     * @param integer $surfaceBalcon
     *
     * @return Annonce
     */
    public function setSurfaceBalcon($surfaceBalcon)
    {
        $this->surfaceBalcon = $surfaceBalcon;

        return $this;
    }

    /**
     * Get surfaceBalcon
     *
     * @return integer
     */
    public function getSurfaceBalcon()
    {
        return $this->surfaceBalcon;
    }

    /**
     * Set accesHandicape
     *
     * @param integer $accesHandicape
     *
     * @return Annonce
     */
    public function setAccesHandicape($accesHandicape)
    {
        $this->accesHandicape = $accesHandicape;

        return $this;
    }

    /**
     * Get accesHandicape
     *
     * @return integer
     */
    public function getAccesHandicape()
    {
        return $this->accesHandicape;
    }

    /**
     * Set alarme
     *
     * @param integer $alarme
     *
     * @return Annonce
     */
    public function setAlarme($alarme)
    {
        $this->alarme = $alarme;

        return $this;
    }

    /**
     * Get alarme
     *
     * @return integer
     */
    public function getAlarme()
    {
        return $this->alarme;
    }

    /**
     * Set ascenseur
     *
     * @param integer $ascenseur
     *
     * @return Annonce
     */
    public function setAscenseur($ascenseur)
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    /**
     * Get ascenseur
     *
     * @return integer
     */
    public function getAscenseur()
    {
        return $this->ascenseur;
    }

    /**
     * Set balcon
     *
     * @param integer $balcon
     *
     * @return Annonce
     */
    public function setBalcon($balcon)
    {
        $this->balcon = $balcon;

        return $this;
    }

    /**
     * Get balcon
     *
     * @return integer
     */
    public function getBalcon()
    {
        return $this->balcon;
    }

    /**
     * Set bureau
     *
     * @param integer $bureau
     *
     * @return Annonce
     */
    public function setBureau($bureau)
    {
        $this->bureau = $bureau;

        return $this;
    }

    /**
     * Get bureau
     *
     * @return integer
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * Set cave
     *
     * @param integer $cave
     *
     * @return Annonce
     */
    public function setCave($cave)
    {
        $this->cave = $cave;

        return $this;
    }

    /**
     * Get cave
     *
     * @return integer
     */
    public function getCave()
    {
        return $this->cave;
    }

    /**
     * Set cellier
     *
     * @param integer $cellier
     *
     * @return Annonce
     */
    public function setCellier($cellier)
    {
        $this->cellier = $cellier;

        return $this;
    }

    /**
     * Get cellier
     *
     * @return integer
     */
    public function getCellier()
    {
        return $this->cellier;
    }

    /**
     * Set dependances
     *
     * @param integer $dependances
     *
     * @return Annonce
     */
    public function setDependances($dependances)
    {
        $this->dependances = $dependances;

        return $this;
    }

    /**
     * Get dependances
     *
     * @return integer
     */
    public function getDependances()
    {
        return $this->dependances;
    }

    /**
     * Set dressing
     *
     * @param integer $dressing
     *
     * @return Annonce
     */
    public function setDressing($dressing)
    {
        $this->dressing = $dressing;

        return $this;
    }

    /**
     * Get dressing
     *
     * @return integer
     */
    public function getDressing()
    {
        return $this->dressing;
    }

    /**
     * Set gardien
     *
     * @param integer $gardien
     *
     * @return Annonce
     */
    public function setGardien($gardien)
    {
        $this->gardien = $gardien;

        return $this;
    }

    /**
     * Get gardien
     *
     * @return integer
     */
    public function getGardien()
    {
        return $this->gardien;
    }

    /**
     * Set interphone
     *
     * @param integer $interphone
     *
     * @return Annonce
     */
    public function setInterphone($interphone)
    {
        $this->interphone = $interphone;

        return $this;
    }

    /**
     * Get interphone
     *
     * @return integer
     */
    public function getInterphone()
    {
        return $this->interphone;
    }

    /**
     * Set lotissement
     *
     * @param integer $lotissement
     *
     * @return Annonce
     */
    public function setLotissement($lotissement)
    {
        $this->lotissement = $lotissement;

        return $this;
    }

    /**
     * Get lotissement
     *
     * @return integer
     */
    public function getLotissement()
    {
        return $this->lotissement;
    }

    /**
     * Set meuble
     *
     * @param integer $meuble
     *
     * @return Annonce
     */
    public function setMeuble($meuble)
    {
        $this->meuble = $meuble;

        return $this;
    }

    /**
     * Get meuble
     *
     * @return integer
     */
    public function getMeuble()
    {
        return $this->meuble;
    }

    /**
     * Set mitoyenne
     *
     * @param integer $mitoyenne
     *
     * @return Annonce
     */
    public function setMitoyenne($mitoyenne)
    {
        $this->mitoyenne = $mitoyenne;

        return $this;
    }

    /**
     * Get mitoyenne
     *
     * @return integer
     */
    public function getMitoyenne()
    {
        return $this->mitoyenne;
    }

    /**
     * Set piscine
     *
     * @param integer $piscine
     *
     * @return Annonce
     */
    public function setPiscine($piscine)
    {
        $this->piscine = $piscine;

        return $this;
    }

    /**
     * Get piscine
     *
     * @return integer
     */
    public function getPiscine()
    {
        return $this->piscine;
    }

    /**
     * Set terrasse
     *
     * @param integer $terrasse
     *
     * @return Annonce
     */
    public function setTerrasse($terrasse)
    {
        $this->terrasse = $terrasse;

        return $this;
    }

    /**
     * Get terrasse
     *
     * @return integer
     */
    public function getTerrasse()
    {
        return $this->terrasse;
    }

    /**
     * Set anciennete
     *
     * @param string $anciennete
     *
     * @return Annonce
     */
    public function setAnciennete($anciennete)
    {
        $this->anciennete = $anciennete;

        return $this;
    }

    /**
     * Get anciennete
     *
     * @return string
     */
    public function getAnciennete()
    {
        return $this->anciennete;
    }

    /**
     * Set anneeConstruction
     *
     * @param integer $anneeConstruction
     *
     * @return Annonce
     */
    public function setAnneeConstruction($anneeConstruction)
    {
        $this->anneeConstruction = $anneeConstruction;

        return $this;
    }

    /**
     * Get anneeConstruction
     *
     * @return integer
     */
    public function getAnneeConstruction()
    {
        return $this->anneeConstruction;
    }

    /**
     * Set exposition
     *
     * @param integer $exposition
     *
     * @return Annonce
     */
    public function setExposition($exposition)
    {
        $this->exposition = $exposition;

        return $this;
    }

    /**
     * Get exposition
     *
     * @return integer
     */
    public function getExposition()
    {
        return $this->exposition;
    }

    /**
     * Set typeChauffage
     *
     * @param string $typeChauffage
     *
     * @return Annonce
     */
    public function setTypeChauffage($typeChauffage)
    {
        $this->typeChauffage = $typeChauffage;

        return $this;
    }

    /**
     * Get typeChauffage
     *
     * @return string
     */
    public function getTypeChauffage()
    {
        return $this->typeChauffage;
    }

    /**
     * Set natureChauffage
     *
     * @param string $natureChauffage
     *
     * @return Annonce
     */
    public function setNatureChauffage($natureChauffage)
    {
        $this->natureChauffage = $natureChauffage;

        return $this;
    }

    /**
     * Get natureChauffage
     *
     * @return string
     */
    public function getNatureChauffage()
    {
        return $this->natureChauffage;
    }

    /**
     * Set modeChauffage
     *
     * @param string $modeChauffage
     *
     * @return Annonce
     */
    public function setModeChauffage($modeChauffage)
    {
        $this->modeChauffage = $modeChauffage;

        return $this;
    }

    /**
     * Get modeChauffage
     *
     * @return string
     */
    public function getModeChauffage()
    {
        return $this->modeChauffage;
    }

    /**
     * Set typeCuisine
     *
     * @param string $typeCuisine
     *
     * @return Annonce
     */
    public function setTypeCuisine($typeCuisine)
    {
        $this->typeCuisine = $typeCuisine;

        return $this;
    }

    /**
     * Get typeCuisine
     *
     * @return string
     */
    public function getTypeCuisine()
    {
        return $this->typeCuisine;
    }

    /**
     * Set coupDeCoeur
     *
     * @param integer $coupDeCoeur
     *
     * @return Annonce
     */
    public function setCoupDeCoeur($coupDeCoeur)
    {
        $this->coupDeCoeur = $coupDeCoeur;

        return $this;
    }

    /**
     * Get coupDeCoeur
     *
     * @return integer
     */
    public function getCoupDeCoeur()
    {
        return $this->coupDeCoeur;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return Annonce
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set textAnglais
     *
     * @param string $textAnglais
     *
     * @return Annonce
     */
    public function setTextAnglais($textAnglais)
    {
        $this->textAnglais = $textAnglais;

        return $this;
    }

    /**
     * Get textAnglais
     *
     * @return string
     */
    public function getTextAnglais()
    {
        return $this->textAnglais;
    }

    /**
     * Set urlVisiteVirtuelle
     *
     * @param string $urlVisiteVirtuelle
     *
     * @return Annonce
     */
    public function setUrlVisiteVirtuelle($urlVisiteVirtuelle)
    {
        $this->urlVisiteVirtuelle = $urlVisiteVirtuelle;

        return $this;
    }

    /**
     * Get urlVisiteVirtuelle
     *
     * @return string
     */
    public function getUrlVisiteVirtuelle()
    {
        return $this->urlVisiteVirtuelle;
    }

    /**
     * Set consommationEnergie
     *
     * @param integer $consommationEnergie
     *
     * @return Annonce
     */
    public function setConsommationEnergie($consommationEnergie)
    {
        $this->consommationEnergie = $consommationEnergie;

        return $this;
    }

    /**
     * Get consommationEnergie
     *
     * @return integer
     */
    public function getConsommationEnergie()
    {
        return $this->consommationEnergie;
    }

    /**
     * Set emissionGes
     *
     * @param integer $emissionGes
     *
     * @return Annonce
     */
    public function setEmissionGes($emissionGes)
    {
        $this->emissionGes = $emissionGes;

        return $this;
    }

    /**
     * Get emissionGes
     *
     * @return integer
     */
    public function getEmissionGes()
    {
        return $this->emissionGes;
    }

    /**
     * Set agence
     *
     * @param \App\Entity\Agence $agence
     *
     * @return Annonce
     */
    public function setAgence(\App\Entity\Agence $agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \App\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set negociateur
     *
     * @param \App\Entity\Negociateur $negociateur
     *
     * @return Annonce
     */
    public function setNegociateur(\App\Entity\Negociateur $negociateur)
    {
        $this->negociateur = $negociateur;

        return $this;
    }

    /**
     * Get negociateur
     *
     * @return \App\Entity\Negociateur
     */
    public function getNegociateur()
    {
        return $this->negociateur;
    }

    /**
     * Set programmeNeuf
     *
     * @param \App\Entity\ProgrammeNeuf $programmeNeuf
     *
     * @return Annonce
     */
    public function setProgrammeNeuf(\App\Entity\ProgrammeNeuf $programmeNeuf = null)
    {
        $this->programmeNeuf = $programmeNeuf;

        return $this;
    }

    /**
     * Get programmeNeuf
     *
     * @return \App\Entity\ProgrammeNeuf
     */
    public function getProgrammeNeuf()
    {
        return $this->programmeNeuf;
    }

    /**
     * Add image
     *
     * @param \App\Entity\Images $image
     *
     * @return Annonce
     */
    public function addImage(\App\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \App\Entity\Images $image
     */
    public function removeImage(\App\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set typeMandat
     *
     * @param \App\Entity\TypeMandat $typeMandat
     *
     * @return Annonce
     */
    public function setTypeMandat(\App\Entity\TypeMandat $typeMandat = null)
    {
        $this->typeMandat = $typeMandat;

        return $this;
    }

    /**
     * Get typeMandat
     *
     * @return \App\Entity\TypeMandat
     */
    public function getTypeMandat()
    {
        return $this->typeMandat;
    }

    /**
     * Set typeBien
     *
     * @param \App\Entity\TypeBien $typeBien
     *
     * @return Annonce
     */
    public function setTypeBien(\App\Entity\TypeBien $typeBien = null)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return \App\Entity\TypeBien
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }
}
