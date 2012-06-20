<?php

namespace Affinity\Workforce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Collections\ArrayCollection;

use Affinity\Workforce\AppBundle\Entity\Group;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    
    /**
     * Set and persist rank data into the database for unit
     * testing and default setup.
     * 
     * @param ObjectManager $manager 
     */
    public function load( ObjectManager $manager )
    {
        $groupManager    = new Group();
        $groupEmployee   = new Group();
        
        $groupManager->setGroupName("Management");
        $groupManager->setGroupDescription("Management.  Run shifts and create schedules.");
        $manager->persist($groupManager);
        
        $groupEmployee->setGroupName("Employees");
        $groupEmployee->setGroupDescription("General employees.");
        $manager->persist($groupEmployee);
        
        $manager->flush();
        
        $this->setReference("manager-group", $groupManager);
        $this->setReference("employee-group", $groupEmployee);
    }
    
    /**
     * Returns the order in which this data fixture should
     * be executed, relative to other data fixtures.
     * 
     * @return int 
     */
    public function getOrder()
    {
        return 2;
    }
}