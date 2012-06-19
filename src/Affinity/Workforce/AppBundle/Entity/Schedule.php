<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="schedule")
 */
class Schedule
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
     * @ORM\Column(type="string", length=1)
     */
    protected $status;
    
    /**
     *
     * @ORM\Column(type="integer", length=2)
     */
    protected $scheduleWeek;
    
    /**
     *
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ScheduleShift", mappedBy="Schedule")
     */
    protected $scheduleShifts;
    
    public function __construct()
    {
        $this->scheduleShifts = new ArrayCollection();
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
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set scheduleWeek
     *
     * @param integer $scheduleWeek
     */
    public function setScheduleWeek($scheduleWeek)
    {
        $this->scheduleWeek = $scheduleWeek;
    }

    /**
     * Get scheduleWeek
     *
     * @return integer 
     */
    public function getScheduleWeek()
    {
        return $this->scheduleWeek;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
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
}