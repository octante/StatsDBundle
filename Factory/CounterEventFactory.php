<?php

namespace Octante\StatsDBundle\Factory;

use Octante\StatsDBundle\Event\CounterEvent;

class CounterEventFactory
{
    /**
     *
     */
    public static function create()
    {
        return new CounterEvent();
    }
}