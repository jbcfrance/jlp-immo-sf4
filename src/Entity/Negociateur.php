<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Negociateur
 * 
 * @ORM\Table(name="negociateur")
 * @ORM\Entity(repositoryClass="App\Repository\NegociateurRepository")
 */
class Negociateur
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Agence", inversedBy="negociateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agence;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Annonce", mappedBy="negociateur")
     */
    private $annonces; // Notez le « s », une annonce est liée à plusieurs candidatures
        
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     * 
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Negociateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Negociateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Negociateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Negociateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Negociateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set agence
     *
     * @param \App\Entity\Agence $agence
     *
     * @return Negociateur
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
     * Constructor
     */
    public function __construct()
    {
        $this->annonces = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add annonce
     *
     * @param \App\Entity\Annonce $annonce
     *
     * @return Negociateur
     */
    public function addAnnonce(\App\Entity\Annonce $annonce)
    {
        $this->annonces[] = $annonce;

        return $this;
    }

    /**
     * Remove annonce
     *
     * @param \App\Entity\Annonce $annonce
     */
    public function removeAnnonce(\App\Entity\Annonce $annonce)
    {
        $this->annonces->removeElement($annonce);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }
}
