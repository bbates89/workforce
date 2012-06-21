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
        $managerGroup       = new Group();
        $shiftGroup         = new Group();
        $employeeGroup      = new Group();
        
        $managerGroup->setGroupName("Management");
        $managerGroup->setGroupDescription("Management.  Run shifts and create schedules.");
        $managerGroup->setType(Group::TYPE_MANAGER);
        $manager->persist($managerGroup);
        
        $shiftGroup->setGroupName("Shift Leaders");
        $shiftGroup->setGroupDescription("Shift leaders.  In charge of shifts.");
        $shiftGroup->setType(Group::TYPE_SUPERVISOR);
        $manager->persist($shiftGroup);
        
        $employeeGroup->setGroupName("Employees");
        $employeeGroup->setGroupDescription("General employees.");
        $employeeGroup->setType(Group::TYPE_EMPLOYEE);
        $manager->persist($employeeGroup);
        
        $manager->flush();
        
        $this->setReference("manager-group", $managerGroup);
        $this->setReference("shift-group", $shiftGroup);
        $this->setReference("employee-group", $employeeGroup);
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