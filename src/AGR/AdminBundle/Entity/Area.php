<?php

namespace AGR\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AGR\AdminBundle\Entity\Area
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
     * @var integer $idBuildingDepartments
     *
     * @ORM\Column(name="id_building_departments", type="integer", nullable=true)
     */
    private $idBuildingDepartments;

    /**
     * @var integer $idGroup
     *
     * @ORM\Column(name="id_group", type="integer", nullable=true)
     */
    private $idGroup;

    /**
     * @var integer $idWorker
     *
     * @ORM\Column(name="id_worker", type="integer", nullable=true)
     */
    private $idWorker;



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
     * Set idBuildingDepartments
     *
     * @param integer $idBuildingDepartments
     * @return Area
     */
    public function setIdBuildingDepartments($idBuildingDepartments)
    {
        $this->idBuildingDepartments = $idBuildingDepartments;
    
        return $this;
    }

    /**
     * Get idBuildingDepartments
     *
     * @return integer 
     */
    public function getIdBuildingDepartments()
    {
        return $this->idBuildingDepartments;
    }

    /**
     * Set idGroup
     *
     * @param integer $idGroup
     * @return Area
     */
    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;
    
        return $this;
    }

    /**
     * Get idGroup
     *
     * @return integer 
     */
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    /**
     * Set idWorker
     *
     * @param integer $idWorker
     * @return Area
     */
    public function setIdWorker($idWorker)
    {
        $this->idWorker = $idWorker;
    
        return $this;
    }

    /**
     * Get idWorker
     *
     * @return integer 
     */
    public function getIdWorker()
    {
        return $this->idWorker;
    }
}