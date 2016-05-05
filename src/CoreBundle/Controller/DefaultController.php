<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Entity\Organization;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Default:index.html.twig', [
            'default'   => 'tototo',
        ]);
    }
}
