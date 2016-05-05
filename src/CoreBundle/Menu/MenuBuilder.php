<?php

namespace CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{

    private $factory;
    
    private $securityContext;

   /**
    * @param FactoryInterface $factory
    *
    * Add any other dependency you need
    */
   public function __construct(FactoryInterface $factory, $securityContext)
   {
       $this->factory = $factory;
       $this->securityContext = $securityContext;
   }

   public function createMainMenu(array $options)
   {
       $menu = $this->factory->createItem('root');

       $menu->addChild('Home', ['route' => 'core_homepage']);
       $menu->addChild('Create Organization', ['route' => 'organization_create']);
       $menu->addChild('List all Organizations', ['route' => 'organization_list']);

       return $menu;
   }

   public function createUserMenu(array $options)
   {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'has-dropdown');
        $menu->addChild('User')->setAttribute('dropdown', true);

        // Verify if user is logged or not
        if ($this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // authenticated REMEMBERED, FULLY will imply REMEMBERED (NON anonymous)
            $menu['User']->addChild('Profile', ['route' => 'user_profile']);
            $menu['User']->addChild('Logout', ['route' => 'fos_user_security_logout']);
        } else {
            $menu['User']->addChild('Subscribe', ['route' => 'fos_user_registration_register']);
            $menu['User']->addChild('Login', ['route' => 'fos_user_security_login']);
        }

       return $menu;
   }
}
