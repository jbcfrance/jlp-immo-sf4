<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBien
 * 
 * @ORM\Table(name="type_bien")
 * @ORM\Entity(repositoryClass="App\Repository\TypeBienRepository")
 */
class TypeBien
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeBien
     *
     * @param string $typeBien
     *
     * @return TypeBien
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return string
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return TypeBien
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
}
