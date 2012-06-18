<?php

namespace Affinity\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Affinity\AppBundle\Entity\Employee;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render( 'AffinityAppBundle:Default:index.html.twig' );
    }
	
	public function createAction()
	{
		$employee = new Employee();
		
		$employee->setUsername('testuser');
		$employee->setPassword('abc123');
		$employee->setEmail('Lorem ipsum dolor');
		$employee->setIsActive( true );
		$employee->setType( 1 );
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist( $employee );
		$em->flush();
		
		return new Response('Created product id ' . $employee->getId() );
	}
	
	public function findAction( $id )
	{
		$employee = $this->getDoctrine()
			->getRepository('AffinityAppBundle:Employee')
			->find( $id );
			
		if( !$employee )
		{
			throw $this->createNotFoundException('No product found for given id ' . $id );
		}
		
		return new Response('Employee Username: ' . $employee->getUsername() );
	}
}
