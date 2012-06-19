<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="schedule_shift")
 */
class ScheduleShift
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
     * @ORM\Column(type="integer", length=11)
     */
    protected $scheduleId;
    
    /**
     *
     * @ORM\Column(type="integer", length=11)
     */
    protected $positionId;
    
    /**
     *
     * @ORM\Column(type="datetime")
     */
    protected $beginTime;
    
    /**
     *
     * @ORM\Column(type="datetime")
     */
    protected $endTime;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Schedule", inversedBy="ScheduleShift")
     * @ORM\JoinColumn(name="schduleId", referencedColumnName="id")
     */
    protected $schedule;
    

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
     * Set scheduleId
     *
     * @param integer $scheduleId
     */
    public function setScheduleId($scheduleId)
    {
        $this->scheduleId = $scheduleId;
    }

    /**
     * Get scheduleId
     *
     * @return integer 
     */
    public function getScheduleId()
    {
        return $this->scheduleId;
    }

    /**
     * Set positionId
     *
     * @param integer $positionId
     */
    public function setPositionId($positionId)
    {
        $this->positionId = $positionId;
    }

    /**
     * Get positionId
     *
     * @return integer 
     */
    public function getPositionId()
    {
        return $this->positionId;
    }

    /**
     * Set beginTime
     *
     * @param datetime $beginTime
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    /**
     * Get beginTime
     *
     * @return datetime 
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Set endTime
     *
     * @param datetime $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * Get endTime
     *
     * @return datetime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set schedule
     *
     * @param Affinity\Workforce\AppBundle\Entity\Schedule $schedule
     */
    public function setSchedule(\Affinity\Workforce\AppBundle\Entity\Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Get schedule
     *
     * @return Affinity\Workforce\AppBundle\Entity\Schedule 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}