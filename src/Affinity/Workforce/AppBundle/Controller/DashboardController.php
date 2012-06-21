<?php
/*
 * Affinity/Workforce/AppBundle/Controller/DashboardController
 * 
 * This controller renders the dashboard for standard
 * employees, shift managers, and general managers. 
 * 
 */

namespace Affinity\Workforce\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use Affinity\Workforce\AppBundle\Entity\Employee;
use Affinity\Workforce\AppBundle\Entity\Group;

class DashboardController extends Controller
{
    /*
     * The index function will route the user to the proper
     * dashboard, based on their group. 
     */
    function indexAction()
    {
        // Get the employee entity
        $employee = $this->get('security.context')->getToken()->getUser();
        
        // Fetch the employee group
        $employeeGroup = $employee->getGroup();
        
        // Route the user to the proper dashboard.
        switch($employeeGroup->getType())
        {
            case Group::TYPE_MANAGER:
                $this->redirect($this->generateUrl('AffinityWorkforce_dashboard_manager'));
                break;
            case Group::TYPE_SUPERVISOR:
                $this->redirect($this->generateUrl('AffinityWorkforce_dashboard_supervisor'));
                break;
            case Group::TYPE_EMPLOYEE:
                $this->redirect($this->generateUrl('AffinityWorkforce_dashboard_employee'));
                break;
            default:
                throw new \RuntimeException("Employee group type not valid.");
                break;
        }
    }
}
