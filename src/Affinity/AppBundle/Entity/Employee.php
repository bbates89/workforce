<?php

/*
 * This file is part of the Affinity Workforce shift
 * management software package.
 *
 * (c) Brendan Bates, 2012
 *
 * This file is the Employee Entity for the Doctrine
 * Data Mapper ORM.
 */
 
 namespace Affinity\AppBundle\Entity;
 
 use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="employee")
 */
 class Employee
 {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $Id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $Username;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $Password;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $IsActive;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $Email;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $Type;
 
    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set Username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->Username = $username;
    }

    /**
     * Get Username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * Set Password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->Password = $password;
    }

    /**
     * Get Password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set IsActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->IsActive = $isActive;
    }

    /**
     * Get IsActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->IsActive;
    }

    /**
     * Set Email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->Email = $email;
    }

    /**
     * Get Email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set Type
     *
     * @param integer $type
     */
    public function setType($type)
    {
        $this->Type = $type;
    }

    /**
     * Get Type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->Type;
    }
}