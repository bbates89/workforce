<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
class Employee
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
     * @ORM\Column(type="string", length=100)
     */
    protected $username;
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $password;
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $salt;
    
    /**
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    
    /**
     *
     * @ORM\Column(type="integer", length=11) 
     */
    protected $groupId;
    
    /**
     *
     * @ORM\Column(type="boolean")
     */
    protected $isActive;
    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="EmployeeShift", mappedBy="Employee")
     */
    protected $employeeShifts;    

    /**
     *
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="Employee")
     * @ORM\JoinColumn(name="groupId", referencedColumnName="id") 
     */
    protected $group;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Position", inversedBy="Employee")
     * @ORM\JoinTable(name="positions_employees")
     */
    protected $positions;
    
    /*
     * Class Constructor
     */
    public function __construct()
    {
        $this->employeeShifts   = new ArrayCollection();
        $this->positions        = new ArrayCollection();
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * Get groupId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add employeeShifts
     *
     * @param Affinity\Workforce\AppBundle\Entity\EmployeeShift $employeeShifts
     */
    public function addEmployeeShift(\Affinity\Workforce\AppBundle\Entity\EmployeeShift $employeeShifts)
    {
        $this->employeeShifts[] = $employeeShifts;
    }

    /**
     * Get employeeShifts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEmployeeShifts()
    {
        return $this->employeeShifts;
    }

    /**
     * Set group
     *
     * @param Affinity\Workforce\AppBundle\Entity\Group $group
     */
    public function setGroup(\Affinity\Workforce\AppBundle\Entity\Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get group
     *
     * @return Affinity\Workforce\AppBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Add positions
     *
     * @param Affinity\Workforce\AppBundle\Entity\Position $positions
     */
    public function addPosition(\Affinity\Workforce\AppBundle\Entity\Position $positions)
    {
        $this->positions[] = $positions;
    }

    /**
     * Get positions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }
}