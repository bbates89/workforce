<?php

namespace Affinity\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Affinity\AppBundle\Entity\Employee;

class EmployeeController extends Controller
{
    public function loginFormAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        
        // Adding a comment for a commit!
        
        $stuff = new \Affinity\AppBundle\DependencyInjection\AffinityAppExtension;
        
        if( $request->attributes->has( SecurityContext::AUTHENTICATION_ERROR )) {
            $error = $request->attributes->get( SecurityContext::AUTHENTICATION_ERROR );
        } else {
            $error = $session->get( SecurityContext::AUTHENTICATION_ERROR );
            $session->remove( SecurityContext::AUTHENTICATION_ERROR );
        }
    
        return $this->render( 'AffinityAppBundle:Employee:login.html.twig', array(
            'last_username' => $session->get( SecurityContext::LAST_USERNAME),
            'error'         => $error
        ));
    }
}