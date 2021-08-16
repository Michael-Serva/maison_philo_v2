<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ChangeLocalSubscriber implements EventSubscriberInterface
{
    private $defaultLocale;

    public function __construct($defaultLocale = 'fr')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }
        /* try to see if the locale has been set as a _locale routing parameter */
        if ($locale = $request->query->get('_locale')) {
            $request->setLocale($locale);
        } else {
            /* if no explicit locale has been set on this request, use one from the session */
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request (Symfony\Component\HttpKernel\Event\RequestEvent)' => 'onKernelRequest(Symfony\Component\HttpKernel\Event\RequestEvent)',
        ];
    }
}
