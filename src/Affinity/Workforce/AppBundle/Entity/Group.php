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
}