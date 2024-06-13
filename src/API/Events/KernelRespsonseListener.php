<?php

namespace App\API\Events;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class KernelRespsonseListener implements EventSubscriberInterface
{
    public function checkResponse(ResponseEvent $event)
    {
        $event->getResponse()->headers->add(['KernelResponseListenerTest' => 'KernelResponseListenerTest']);
    }
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => [
                ['checkResponse', -10]
            ]
        ];
    }
}