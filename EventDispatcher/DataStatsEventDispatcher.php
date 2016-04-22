<?php

namespace Octante\StatsDBundle\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Octante\StatsDBundle\Event\DataEvent;

class DataStatsEventDispatcher extends EventDispatcher
{
    /**
     * @var EventDispatcherInterface
     *
     * Event dispatcher
     */
    private $eventDispatcher;

    /**
     * Construct method
     *
     * @param EventDispatcherInterface $eventDispatcher Event dispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param DataEvent $dataEvent
     */
    public function dispatchEvent(DataEvent $dataEvent)
    {
        $this->eventDispatcher->dispatch('data.stats', $dataEvent);
    }
}