<?php

namespace ACC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACC\AdminBundle\Entity\Area
 *
 * @ORM\Table(name="area")
 * @ORM\Entity
 */
class Area
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
     * @var Workers
     *
     * @ORM\ManyToOne(targetEntity="Workers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_worker", referencedColumnName="id")
     * })
     */
    private $idWorker;

    /**
     * @var BuildingDepartment
     *
     * @ORM\ManyToOne(targetEntity="BuildingDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_building_departments", referencedColumnName="id")
     * })
     */
    private $idBuildingDepartments;

    /**
     * @var Groups
     *
     * @ORM\ManyToOne(targetEntity="Groups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_group", referencedColumnName="id")
     * })
     */
    private $idGroup;



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
     * Set idWorker
     *
     * @param ACC\AdminBundle\Entity\Workers $idWorker
     * @return Area
     */
    public function setIdWorker(\ACC\AdminBundle\Entity\Workers $idWorker = null)
    {
        $this->idWorker = $idWorker;
    
        return $this;
    }

    /**
     * Get idWorker
     *
     * @return ACC\AdminBundle\Entity\Workers 
     */
    public function getIdWorker()
    {
        return $this->idWorker;
    }

    /**
     * Set idBuildingDepartments
     *
     * @param ACC\AdminBundle\Entity\BuildingDepartment $idBuildingDepartments
     * @return Area
     */
    public function setIdBuildingDepartments(\ACC\AdminBundle\Entity\BuildingDepartment $idBuildingDepartments = null)
    {
        $this->idBuildingDepartments = $idBuildingDepartments;
    
        return $this;
    }

    /**
     * Get idBuildingDepartments
     *
     * @return ACC\AdminBundle\Entity\BuildingDepartment 
     */
    public function getIdBuildingDepartments()
    {
        return $this->idBuildingDepartments;
    }

    /**
     * Set idGroup
     *
     * @param ACC\AdminBundle\Entity\Groups $idGroup
     * @return Area
     */
    public function setIdGroup(\ACC\AdminBundle\Entity\Groups $idGroup = null)
    {
        $this->idGroup = $idGroup;
    
        return $this;
    }

    /**
     * Get idGroup
     *
     * @return ACC\AdminBundle\Entity\Groups 
     */
    public function getIdGroup()
    {
        return $this->idGroup;
    }
    
    public function __toString()
    {
    	return ' Департамент:'.$this->idBuildingDepartments.' Група:'.$this->idGroup;
    }
}