<?php

namespace Octante\StatsDBundle\Factory;

use Octante\StatsDBundle\Event\TimerEvent;

class TimerEventFactory
{
    /**
     *
     */
    public static function create()
    {
        return new TimerEvent();
    }
}