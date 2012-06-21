<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="groups")
 */
class Group
{    
    const TYPE_MANAGER      = 'manager';
    const TYPE_SUPERVISOR   = 'supervisor';
    const TYPE_EMPLOYEE     = 'employee';
    
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
    protected $groupName;
    
    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $groupDescription;
    
    /**
     *
     * @ORM\Column(type="string", length=10, columnDefinition="ENUM('manager','supervisor','employee')")
     */
    protected $type;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="Group")
     */
    protected $employees;
    
    public function __construct()
    {
        $this->employees    = new ArrayCollection();
        $this->positions    = new Arraycollection();
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
     * Set groupName
     *
     * @param string $groupName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * Get groupName
     *
     * @return string 
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Set groupDescription
     *
     * @param string $groupDescription
     */
    public function setGroupDescription($groupDescription)
    {
        $this->groupDescription = $groupDescription;
    }

    /**
     * Get groupDescription
     *
     * @return string 
     */
    public function getGroupDescription()
    {
        return $this->groupDescription;
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
     * Set type
     *
     * @param integer $type
     */
    public function setType($type)
    {
        if( !in_array($type, array( 
            self::TYPE_EMPLOYEE,
            self::TYPE_MANAGER,
            self::TYPE_SUPERVISOR
        )))
        {
            throw new \InvalidArgumentException("Invalid type code on Group->setType");
        }
        
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
}