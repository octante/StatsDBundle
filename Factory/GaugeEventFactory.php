<?php

namespace Octante\StatsDBundle\Factory;

use Octante\StatsDBundle\Event\GaugeEvent;

class GaugeEventFactory
{
    /**
     *
     */
    public static function create()
    {
        return new GaugeEvent();
    }
}