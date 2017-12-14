<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="images",uniqueConstraints={@ORM\UniqueConstraint(name="image_unique",columns={"annonce_id","fileName"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
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
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255)
     */
    private $fileName;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Annonce", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typeImage = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return Images
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Add typeImage
     *
     * @param \App\Entity\TypeImage $typeImage
     *
     * @return Images
     */
    public function addTypeImage(\App\Entity\TypeImage $typeImage)
    {
        $this->typeImage[] = $typeImage;

        return $this;
    }

    /**
     * Remove typeImage
     *
     * @param \App\Entity\TypeImage $typeImage
     */
    public function removeTypeImage(\App\Entity\TypeImage $typeImage)
    {
        $this->typeImage->removeElement($typeImage);
    }

    /**
     * Get typeImage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypeImage()
    {
        return $this->typeImage;
    }

    /**
     * Set typeImage
     *
     * @param \App\Entity\TypeImage $typeImage
     *
     * @return Images
     */
    public function setTypeImage(\App\Entity\TypeImage $typeImage = null)
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    /**
     * Set annonce
     *
     * @param \App\Entity\Annonce $annonce
     *
     * @return Images
     */
    public function setAnnonce(\App\Entity\Annonce $annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \App\Entity\Annonce
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
    
    
}
