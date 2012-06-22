<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="notifications")
 */
class Notification
{
    // Standard Employee Notification Types
    const   TYPE_NEW_SCHEDULE           = 1;
    const   TYPE_NEW_SHIFT_REQUEST      = 2;
    const   TYPE_SHIFT_CHANGE_REQUEST   = 3;
    const   TYPE_MESSAGE                = 4;
    const   TYPE_SHIFT_POSTED           = 5;
    
    // Supervisor Notification Types
    const   TYPE_APPROVE_SHIFT_CHANGE   = 6;
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="integer")
     */
    protected  $employeeId;

    /**
     *
     * @ORM\Column(type="integer")
     */
    protected $type;
    
    /**
     *
     * @ORM\Column(type="integer") 
     */
    protected $reference;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="Notification")
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
     * Set type
     *
     * @param integer $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set reference
     *
     * @param integer $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
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