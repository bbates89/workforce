<?php

namespace Affinity\Workforce\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="settings")
 */
class Setting
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
     * @ORM\Column(type="string", length=50) 
     */
    protected $config_key;
    
    /**
     * 
     * @ORM\Column(type="string", length=200)
     */
    protected $value;

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
     * Set config_key
     *
     * @param string $configKey
     */
    public function setConfigKey($configKey)
    {
        $this->config_key = $configKey;
    }

    /**
     * Get config_key
     *
     * @return string 
     */
    public function getConfigKey()
    {
        return $this->config_key;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}