<?php

namespace CoreBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserRegisterListener implements EventSubscriberInterface
{
    private $router;
    private $logger;
    
    public function __construct(UrlGeneratorInterface $router, $logger)
    {
        $this->router = $router;
        $this->logger = $logger;
    }
    
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onUserRegisterSuccess',
        );
    }

    /**
     * Redirect on user create association or find new association
     */
    public function onUserRegisterSuccess(FormEvent $event)
    {
        $url = $this->router->generate('user_first_visit');

        $event->setResponse(new RedirectResponse($url));
    }
}