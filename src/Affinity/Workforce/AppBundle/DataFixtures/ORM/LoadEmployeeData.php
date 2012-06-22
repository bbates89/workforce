<?php


namespace Affinity\Workforce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Affinity\Workforce\AppBundle\Entity\Employee;
use Affinity\Workforce\AppBundle\Entity\EmployeeData;

class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    
    private $diContainer;
    
    public function setContainer(ContainerInterface $container = null)
    {
        $this->diContainer = $container;
    }
    
    /**
     * Create the employee data objects, before creating
     * the employee data objects.
     * 
     * @param ObjectManager $manager 
     */
    private function __loadDataObjects( ObjectManager $manager )
    {
        $employeeManagerData    = new EmployeeData();
        $employeeShiftData      = new EmployeeData();
        $employeeServiceData    = new EmployeeData();
        $employeeDriverData     = new EmployeeData();
        
        $employeeManagerData->setEmployeeId(0);
        $employeeManagerData->setFirstName("John");
        $employeeManagerData->setLastName(("Doe"));
        $employeeManagerData->setAddress("123 Blah Street");
        $employeeManagerData->setCity("Blahville");
        $employeeManagerData->setState("Blahstate");
        $employeeManagerData->setZip("12345");
        $employeeManagerData->setPhone("5551234567");
        $manager->persist($employeeManagerData);
        $this->setReference('manager-data',$employeeManagerData);
        
        $employeeShiftData->setEmployeeId(0);
        $employeeShiftData->setFirstName("Jane");
        $employeeShiftData->setLastName(("Smith"));
        $employeeShiftData->setAddress("123 Blah Street");
        $employeeShiftData->setCity("Blahville");
        $employeeShiftData->setState("Blahstate");
        $employeeShiftData->setZip("12345");
        $employeeShiftData->setPhone("5551234567");
        $manager->persist($employeeShiftData);
        $this->setReference('supervisor-data',$employeeShiftData);
        
        $employeeServiceData->setEmployeeId(0);
        $employeeServiceData->setFirstName("Brendan");
        $employeeServiceData->setLastName(("Bates"));
        $employeeServiceData->setAddress("123 Blah Street");
        $employeeServiceData->setCity("Blahville");
        $employeeServiceData->setState("Blahstate");
        $employeeServiceData->setZip("12345");
        $employeeServiceData->setPhone("5551234567");
        $manager->persist($employeeServiceData);
        $this->setReference('service-data',$employeeServiceData);
        
        $employeeDriverData->setEmployeeId(0);
        $employeeDriverData->setFirstName("Robert");
        $employeeDriverData->setLastName(("Connors"));
        $employeeDriverData->setAddress("123 Blah Street");
        $employeeDriverData->setCity("Blahville");
        $employeeDriverData->setState("Blahstate");
        $employeeDriverData->setZip("12345");
        $employeeDriverData->setPhone("5551234567");
        $manager->persist($employeeDriverData);
        $this->setReference('driver-data',$employeeDriverData);
        
        $manager->flush();        
    }
    
    public function load( ObjectManager $manager )
    {
        
        // Create the employee data objects.
        $this->__loadDataObjects($manager);
        
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
        $employeeManager->setEmployeeData( $this->getReference("manager-data") );
        
        /* Persist data to the database */
        $manager->persist( $employeeManager );
        
        // Fill manager employee information.
        $employeeShift->setUsername("test.supervisor");
        $employeeShift->setSalt( md5(time()) );
        $employeeShift->setPassword( $encoder->encodePassword("test123", $employeeShift->getSalt()) );
        $employeeShift->setIsActive(true);
        $employeeShift->setEmail("test.manager@example.com");
        $employeeShift->setGroup( $manager->merge( $this->getReference("shift-group") ) );
        $employeeShift->addPosition( $this->getReference("shift-leader-position" ) );
        $employeeManager->setEmployeeData( $this->getReference("supervisor-data") );
        
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
        $employeeManager->setEmployeeData( $this->getReference("service-data") );
        
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
        $employeeManager->setEmployeeData( $this->getReference("driver-data") );
        
        /* Persist data to the database */
        $manager->persist( $employeeDriver );
        
        $manager->flush();
        
    }
    
    public function getOrder()
    {
        return 3;
    }
    
}