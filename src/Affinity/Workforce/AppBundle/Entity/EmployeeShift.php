<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="employee_shifts")
 */
class EmployeeShift
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
    protected $employeeId;
    
    /**
     *
     * @ORM\Column(type="integer", length=11) 
     */
    protected $scheduleShiftId;
    
    
    /*
     * EmployeeShift Relationships
     */
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="EmployeeShift")
     * @ORM\JoinColumn(name="employeeId", referencedColumnName="id")
     */
    protected $employee;
    


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
     * Set employeeId
     *
     * @param integer $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Get employeeId
     *
     * @return integer 
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set scheduleShiftId
     *
     * @param integer $scheduleShiftId
     */
    public function setScheduleShiftId($scheduleShiftId)
    {
        $this->scheduleShiftId = $scheduleShiftId;
    }

    /**
     * Get scheduleShiftId
     *
     * @return integer 
     */
    public function getScheduleShiftId()
    {
        return $this->scheduleShiftId;
    }

    /**
     * Set employee
     *
     * @param Affinity\Workforce\AppBundle\Entity\Employee $employee
     */
    public function setEmployee(\Affinity\Workforce\AppBundle\Entity\Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Get employee
     *
     * @return Affinity\Workforce\AppBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}