<?php


namespace Affinity\Workforce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Affinity\Workforce\AppBundle\Entity\Position;

class LoadPositionData extends AbstractFixture implements OrderedFixtureInterface
{
    
    public function load( ObjectManager $manager )
    {
        $deliveryPosition = new Position();
        $deliveryPosition->setName("Delivery Driver");
        $deliveryPosition->setDescription("Senior support for elevated issues.");
        $deliveryPosition->setIsInCharge(false);
        $manager->persist($deliveryPosition);
        $this->setReference("driver-position", $deliveryPosition);
        
        $frontPosition = new Position();
        $frontPosition->setName("Front Service");
        $frontPosition->setDescription("Take customers orders, and maintain restaraunt santitation.");
        $frontPosition->setIsInCharge(false);
        $manager->persist($frontPosition);
        $this->setReference("service-position", $frontPosition);
        
        $grillPosition = new Position();
        $grillPosition->setName("Grill Cook");
        $grillPosition->setDescription("Cook food for hungry guests.");
        $grillPosition->setIsInCharge(false);
        $manager->persist($grillPosition);
        $this->setReference("grill-position", $grillPosition);
        
        $manager->flush();
        
        $shiftPosition = new Position();
        $shiftPosition->setName("Shift Leader");
        $shiftPosition->setDescription("Support team for helping clients with problems.");
        $shiftPosition->setIsInCharge(true);        
        $shiftPosition->addPosition( $frontPosition );
        $shiftPosition->addPosition( $grillPosition );
        $manager->persist($shiftPosition);
        $this->setReference("shift-leader-position", $shiftPosition);
        
        
        $managerPosition = new Position();
        $managerPosition->setName("Shift Leader");
        $managerPosition->setDescription("Support team for helping clients with problems.");
        $managerPosition->setIsInCharge(true);        
        $managerPosition->addPosition( $frontPosition );
        $managerPosition->addPosition( $grillPosition );
        $managerPosition->addPosition( $shiftPosition );
        $managerPosition->addPosition( $deliveryPosition );
        $manager->persist($managerPosition);
        $this->setReference("manager-position", $managerPosition);
        
        $manager->flush();
        
    }
    
    public function getOrder()
    {
        return 1;
    }
}