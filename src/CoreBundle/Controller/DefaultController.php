<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Entity\Organization;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $orgManager = $this->get('core.manager.organization');
        
        $orga = new Organization("cwxcdsfds", new \DateTime());
        
        $orgaCreate = $orgManager->create($orga); 
        
        $orgaFind = $orgManager->findOrga($orgaCreate->getId());
        
        $default = $orgaFind->getName();
        
        return $this->render('CoreBundle:Default:index.html.twig', [
            'default'   => $default,
        ]);
    }
}
