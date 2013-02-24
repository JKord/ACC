<?php

namespace ACC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACC\AdminBundle\Entity\Objects
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
     * @ORM\Column(name="addresses", type="string", nullable=true)
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
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @var Area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area", referencedColumnName="id")
     * })
     */
    private $idArea;



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

    /**
     * Set idCategory
     *
     * @param ACC\AdminBundle\Entity\Categories $idCategory
     * @return Objects
     */
    public function setIdCategory(\ACC\AdminBundle\Entity\Categories $idCategory = null)
    {
        $this->idCategory = $idCategory;
    
        return $this;
    }

    /**
     * Get idCategory
     *
     * @return ACC\AdminBundle\Entity\Categories 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set idArea
     *
     * @param ACC\AdminBundle\Entity\Area $idArea
     * @return Objects
     */
    public function setIdArea(\ACC\AdminBundle\Entity\Area $idArea = null)
    {
        $this->idArea = $idArea;
    
        return $this;
    }

    /**
     * Get idArea
     *
     * @return ACC\AdminBundle\Entity\Area 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }
}