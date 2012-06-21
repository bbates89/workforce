<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="positions")
 */
class Position
{
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     *
     * @ORM\Column(type="string") 
     */
    protected $description;
    
    /**
     *
     * @ORM\Column(type="boolean")
     */
    protected $isInCharge;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ScheduleShift", mappedBy="Position")
     */
    protected $scheduleShifts;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Employee", mappedBy="Position")
     */
    protected $employees;    
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Position")
     * @ORM\JoinTable(name="positions_tree",
     *      joinColumns={@ORM\JoinColumn(name="parent_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="child_id", referencedColumnName="id")}
     *      )
     */
    protected $childPositions;
    
    function __construct()
    {
        $this->scheduleShifts   = new ArrayCollection();
        $this->employees        = new ArrayCollection();
        $this->ranks            = new ArrayCollection();
        $this->childPositions   = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Set isInCharge
     *
     * @param boolean $isInCharge
     */
    public function setIsInCharge($isInCharge)
    {
        $this->isInCharge = $isInCharge;
    }

    /**
     * Get isInCharge
     *
     * @return boolean 
     */
    public function getIsInCharge()
    {
        return $this->isInCharge;
    }

    /**
     * Add scheduleShifts
     *
     * @param Affinity\Workforce\AppBundle\Entity\ScheduleShift $scheduleShifts
     */
    public function addScheduleShift(\Affinity\Workforce\AppBundle\Entity\ScheduleShift $scheduleShifts)
    {
        $this->scheduleShifts[] = $scheduleShifts;
    }

    /**
     * Get scheduleShifts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getScheduleShifts()
    {
        return $this->scheduleShifts;
    }

    /**
     * Add employees
     *
     * @param Affinity\Workforce\AppBundle\Entity\Employee $employees
     */
    public function addEmployee(\Affinity\Workforce\AppBundle\Entity\Employee $employees)
    {
        $this->employees[] = $employees;
    }

    /**
     * Get employees
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Add childPositions
     *
     * @param Affinity\Workforce\AppBundle\Entity\Position $childPositions
     */
    public function addPosition(\Affinity\Workforce\AppBundle\Entity\Position $childPositions)
    {
        $this->childPositions[] = $childPositions;
    }

    /**
     * Get childPositions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildPositions()
    {
        return $this->childPositions;
    }
}