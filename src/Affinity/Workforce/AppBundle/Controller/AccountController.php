<?php
/*
 * Affinity/Workforce/AppBundle/Controller/AccountController
 * 
 * This controller is in charge of various account
 * functionalities, such as logging in, logging out, changing
 * account specific information (such as password or email
 * address).   
 * 
 */

namespace Affinity\Workforce\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class AccountController extends Controller
{
    
    /*
     * Allows the user to login.  Provides user with
     * login form, and serves error.
     */
    public function loginAction()
    {
        // Get the session data.
        $request = $this->getRequest();
        $session = $request->getSession();
        
        // Request for a login error.  Check if it exists in the
        // request domain, if not, use session error.
        if( $request->attributes->has( SecurityContext::AUTHENTICATION_ERROR ))
        {
            $error = $request->attributes->get( SecurityContext::AUTHENTICATION_ERROR );
        } else
        {
            $error = $session->get( SecurityContext::AUTHENTICATION_ERROR );
            $session->remove( SecurityContext::AUTHENTICATION_ERROR );
        }
        
        // Return the login rendering screen.
        return $this->render( 'AffinityWorkforceAppBundle:Account:login.html.twig', array(
            'last_username'     => $session->get( SecurityContext::LAST_USERNAME ),
            'error'             => $error
        ) );
    }
}
