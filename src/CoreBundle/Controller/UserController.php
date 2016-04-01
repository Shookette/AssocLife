<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function subscribeAction()
    {
        return $this->render('CoreBundle:User:subscribe.html.twig');
    }

    public function loginAction()
    {
        return $this->render('CoreBundle:User:login.html.twig');
    }
}
