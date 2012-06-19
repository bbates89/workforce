<?php

namespace Affinity\Workforce\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AffinityWorkforceAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
