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
        $supportPosition = new Position();
        $supportPosition->setName("Shift Leader");
        $supportPosition->setDescription("Support team for helping clients with problems.");
        $supportPosition->setRequiresQualification(false);
        $manager->persist($supportPosition);
        
        $seniorSupportPosition = new Position();
        $seniorSupportPosition->setName("Delivery Driver");
        $seniorSupportPosition->setDescription("Senior support for elevated issues.");
        $seniorSupportPosition->setRequiresQualification(true);
        $manager->persist($seniorSupportPosition);
        
        $shiftManagerPosition = new Position();
        $shiftManagerPosition->setName("Front Service");
        $shiftManagerPosition->setDescription("Oversee shifts and deal with problems which may arise.");
        $shiftManagerPosition->setRequiresQualification(true);
        $manager->persist($shiftManagerPosition);
        
        $manager->flush();
        
        $this->setReference("manager-position", $supportPosition);
        $this->setReference("driver-position", $seniorSupportPosition);
        $this->setReference("service-position", $shiftManagerPosition);
    }
    
    public function getOrder()
    {
        return 1;
    }
}