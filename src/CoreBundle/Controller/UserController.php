<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     *
     */
    public function showProfileAction()
    {
        $logger     = $this->get('logger');
        // Get user store in session
        $user       = $this->get('security.token_storage')->getToken()->getUser();
        
        $logger->error('==============================');
        $logger->error('====== showProfileAction =====');
        $logger->error('==============================');
        
        return $this->render(
            'CoreBundle:User:profile.html.twig',
            [
                'user'  => $user
            ]
        );
    }
    
    // TODO: Create form with select between create or find association
    public function firstVisitAction()
    {
        $logger     = $this->get('logger');
        // Get user store in session
        $user       = $this->get('security.token_storage')->getToken()->getUser();
        
        $logger->error('==============================');
        $logger->error('====== firstVisitAction ======');
        $logger->error('==============================');
        
        return $this->render(
            'CoreBundle:User:profile.html.twig',
            [
                'user'  => $user
            ]
        );
    }
}
