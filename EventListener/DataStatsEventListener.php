<?php

namespace Octante\StatsDBundle\EventListener;

use Octante\StatsDBundle\Event\CounterEvent;
use Octante\StatsDBundle\Event\DataEvent;
use Liuggio\StatsdClient\Service\StatsdService;

class DataStatsEventListener
{
    /**
     * @var StatsdService
     */
    private $statsdService;

    /**
     * DataStatsEventListener constructor.
     *
     * @param StatsdService $statsdService
     */
    public function __construct(StatsdService $statsdService)
    {
        $this->statsdService = $statsdService;
    }

    /**
     * @param DataEvent $dataEvent
     *
     * @throws \Exception
     */
    public function onReceived(DataEvent $dataEvent)
    {
        switch ($dataEvent->getEventType()) {
            case 'counter':
                switch ($dataEvent->getIncrementDecrement()) {
                    case CounterEvent::INC:
                        $this
                            ->statsdService
                            ->increment($dataEvent->getKey());
                        break;
                    case CounterEvent::DEC:
                        $this
                            ->statsdService
                            ->decrement($dataEvent->getKey());
                        break;
                }

                break;
            case 'gauge':
                $this
                    ->statsdService
                    ->gauge($dataEvent->getKey(), $dataEvent->getValue());
                break;
            case 'timer':
                $this
                    ->statsdService
                    ->timing($dataEvent->getKey(), $dataEvent->getValue());
                break;
            case 'set':
                $this
                    ->statsdService
                    ->set($dataEvent->getKey(), $dataEvent->getValue());
                break;
            default:
                throw new \Exception('Invalid event type');
        }

        $this
            ->statsdService
            ->flush();

        echo $dataEvent->getKey() . " - " . $dataEvent->getValue() . "\n";
    }
}