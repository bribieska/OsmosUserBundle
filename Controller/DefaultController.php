<?php

namespace OsmosUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OsmosUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
