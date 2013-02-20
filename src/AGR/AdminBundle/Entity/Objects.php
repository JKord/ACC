<?php

namespace AGR\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AGR\AdminBundle\Entity\Objects
 *
 * @ORM\Table(name="objects")
 * @ORM\Entity
 */
class Objects
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $idCategory
     *
     * @ORM\Column(name="id_category", type="integer", nullable=true)
     */
    private $idCategory;

    /**
     * @var integer $idArea
     *
     * @ORM\Column(name="id_area", type="integer", nullable=true)
     */
    private $idArea;

    /**
     * @var integer $floors
     *
     * @ORM\Column(name="floors", type="integer", nullable=true)
     */
    private $floors;

    /**
     * @var string $buildingMaterial
     *
     * @ORM\Column(name="building_material", type="string", length=50, nullable=true)
     */
    private $buildingMaterial;

    /**
     * @var integer $addresses
     *
     * @ORM\Column(name="addresses", type="integer", nullable=true)
     */
    private $addresses;

    /**
     * @var integer $entrances
     *
     * @ORM\Column(name="entrances", type="integer", nullable=true)
     */
    private $entrances;

    /**
     * @var string $size
     *
     * @ORM\Column(name="size", type="string", length=50, nullable=true)
     */
    private $size;

    /**
     * @var string $typeApartments
     *
     * @ORM\Column(name="type_apartments", type="text", nullable=true)
     */
    private $typeApartments;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;



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
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Objects
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    
        return $this;
    }

    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set idArea
     *
     * @param integer $idArea
     * @return Objects
     */
    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;
    
        return $this;
    }

    /**
     * Get idArea
     *
     * @return integer 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }

    /**
     * Set floors
     *
     * @param integer $floors
     * @return Objects
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;
    
        return $this;
    }

    /**
     * Get floors
     *
     * @return integer 
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * Set buildingMaterial
     *
     * @param string $buildingMaterial
     * @return Objects
     */
    public function setBuildingMaterial($buildingMaterial)
    {
        $this->buildingMaterial = $buildingMaterial;
    
        return $this;
    }

    /**
     * Get buildingMaterial
     *
     * @return string 
     */
    public function getBuildingMaterial()
    {
        return $this->buildingMaterial;
    }

    /**
     * Set addresses
     *
     * @param integer $addresses
     * @return Objects
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    
        return $this;
    }

    /**
     * Get addresses
     *
     * @return integer 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set entrances
     *
     * @param integer $entrances
     * @return Objects
     */
    public function setEntrances($entrances)
    {
        $this->entrances = $entrances;
    
        return $this;
    }

    /**
     * Get entrances
     *
     * @return integer 
     */
    public function getEntrances()
    {
        return $this->entrances;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Objects
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set typeApartments
     *
     * @param string $typeApartments
     * @return Objects
     */
    public function setTypeApartments($typeApartments)
    {
        $this->typeApartments = $typeApartments;
    
        return $this;
    }

    /**
     * Get typeApartments
     *
     * @return string 
     */
    public function getTypeApartments()
    {
        return $this->typeApartments;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Objects
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}