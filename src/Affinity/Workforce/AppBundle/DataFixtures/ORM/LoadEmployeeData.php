<?php


namespace Affinity\Workforce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Affinity\Workforce\AppBundle\Entity\Employee;

class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    
    private $diContainer;
    
    public function setContainer(ContainerInterface $container = null)
    {
        $this->diContainer = $container;
    }
    
    public function load( ObjectManager $manager )
    {
        // Create the employee objects.
        $employeeManager    = new Employee();
        $employeeShift      = new Employee();
        $employeeService    = new Employee();
        $employeeDriver     = new Employee();
        
        // Get the password encoder using the encoder factory service.
        $factory = $this->diContainer->get("security.encoder_factory");
        $encoder = $factory->getEncoder($employeeManager);
        
        
        
        // Fill manager employee information.
        $employeeManager->setUsername("test.manager");
        $employeeManager->setSalt( md5(time()) );
        $employeeManager->setPassword( $encoder->encodePassword("test123", $employeeManager->getSalt()) );
        $employeeManager->setIsActive(true);
        $employeeManager->setEmail("test.manager@example.com");
        $employeeManager->setGroup( $manager->merge( $this->getReference("manager-group") ) );
        $employeeManager->addPosition( $this->getReference("manager-position" ) );
        
        /* Persist data to the database */
        $manager->persist( $employeeManager );
        
        // Fill manager employee information.
        $employeeShift->setUsername("test.shift");
        $employeeShift->setSalt( md5(time()) );
        $employeeShift->setPassword( $encoder->encodePassword("test123", $employeeShift->getSalt()) );
        $employeeShift->setIsActive(true);
        $employeeShift->setEmail("test.manager@example.com");
        $employeeShift->setGroup( $manager->merge( $this->getReference("shift-group") ) );
        $employeeShift->addPosition( $this->getReference("shift-leader-position" ) );
        
        /* Persist data to the database */
        $manager->persist( $employeeShift );
        
        // Fill normal employee information.
        $employeeService->setUsername("test.service");
        $employeeService->setSalt( md5(time()) );
        $employeeService->setPassword( $encoder->encodePassword("test123", $employeeService->getSalt()) );
        $employeeService->setIsActive(true);
        $employeeService->setEmail("test.normal@example.com");
        $employeeService->setGroup( $manager->merge( $this->getReference("employee-group") ) );
        $employeeService->addPosition( $this->getReference("driver-position" ) );
        $employeeService->addPosition( $this->getReference("service-position" ) );
        
        /* Persist data to the database */
        $manager->persist( $employeeService );
        
        // Fill normal employee information.
        $employeeDriver->setUsername("test.driver");
        $employeeDriver->setSalt( md5(time()) );
        $employeeDriver->setPassword( $encoder->encodePassword("test123", $employeeDriver->getSalt()) );
        $employeeDriver->setIsActive(true);
        $employeeDriver->setEmail("test.normal@example.com");
        $employeeDriver->setGroup( $manager->merge( $this->getReference("employee-group") ) );
        $employeeDriver->addPosition( $this->getReference("driver-position" ) );
        
        /* Persist data to the database */
        $manager->persist( $employeeDriver );
        
        $manager->flush();
        
    }
    
    public function getOrder()
    {
        return 3;
    }
    
}