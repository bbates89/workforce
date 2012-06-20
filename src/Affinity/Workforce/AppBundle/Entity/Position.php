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
    protected $requiresQualification;
    
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
    
    function __construct()
    {
        $this->scheduleShifts   = new ArrayCollection();
        $this->employees        = new ArrayCollection();
        $this->ranks            = new ArrayCollection();
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
     * Set requiresQualification
     *
     * @param boolean $requiresQualification
     */
    public function setRequiresQualification($requiresQualification)
    {
        $this->requiresQualification = $requiresQualification;
    }

    /**
     * Get requiresQualification
     *
     * @return boolean 
     */
    public function getRequiresQualification()
    {
        return $this->requiresQualification;
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
}