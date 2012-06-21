<?php


namespace Affinity\Workforce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Affinity\Workforce\AppBundle\Entity\Position;

class LoadSettingData extends AbstractFixture implements OrderedFixtureInterface
{
    function load( ObjectManager $manager )
    {
        
    }
    
    function getOrder()
    {
        return 4;
    }
}