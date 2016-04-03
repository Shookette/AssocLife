<?php

namespace CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{

    private $factory;

   /**
    * @param FactoryInterface $factory
    *
    * Add any other dependency you need
    */
   public function __construct(FactoryInterface $factory)
   {
       $this->factory = $factory;
   }

   public function createMainMenu(array $options)
   {
       $menu = $this->factory->createItem('root');

       $menu->addChild('Home', ['route' => 'core_homepage']);

       return $menu;
   }

   public function createUserMenu(array $options)
   {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'has-dropdown');
        $menu->addChild('User')->setAttribute('dropdown', true);

        $menu['User']->addChild('Profile', ['uri' => '#']);
        $menu['User']->addChild('Subscribe', ['route' => 'user_subscribe']);
        $menu['User']->addChild('Login', ['route' => 'user_login']);
        $menu['User']->addChild('Logout', ['uri' => '#']);

       return $menu;
   }
}
