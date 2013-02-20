<?php

namespace AGR\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AGR\AdminBundle\Entity\BuildingDepartment
 *
 * @ORM\Table(name="building_department")
 * @ORM\Entity
 */
class BuildingDepartment
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
     * @var integer $name
     *
     * @ORM\Column(name="name", type="integer", nullable=true)
     */
    private $name;



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
     * Set name
     *
     * @param integer $name
     * @return BuildingDepartment
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }
}