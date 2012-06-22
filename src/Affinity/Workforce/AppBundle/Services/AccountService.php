<?php
/*
 * AccountService
 * 
 * This class provides common functionality for employee
 * objects across the application.
 * 
 */


namespace Affinity\Workforce\AppBundle\Services;

use Affinity\Workforce\AppBundle\Entity\Employee;
use Affinity\Workforce\AppBundle\Entity\EmployeeData;

class AccountService
{
    function getEmployeeShortName( Employee $employee )
    {
        $employeeData = $employee->getEmployeeData();
        
        return $employeeData->getFirstName() . ' ' . substr( $employeeData->getLastName(), 0, 1 ) . '.';
    }
}