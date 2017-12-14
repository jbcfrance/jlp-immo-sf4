<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeImage
 * 
 * @ORM\Table(name="type_image")
 * @ORM\Entity(repositoryClass="App\Repository\TypeImageRepository")
 */
class TypeImage
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="width", type="integer")
     */
    private $width;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="height", type="integer")
     */
    private $height;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="dir", type="string", length=255)
     */
    private $dir;
    

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
     * Set typeImage
     *
     * @param string $typeImage
     *
     * @return TypeImage
     */
    public function setTypeImage($typeImage)
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    /**
     * Get typeImage
     *
     * @return string
     */
    public function getTypeImage()
    {
        return $this->typeImage;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return TypeImage
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return TypeImage
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return TypeImage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set dir
     *
     * @param string $dir
     *
     * @return TypeImage
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * Get dir
     *
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }
}
