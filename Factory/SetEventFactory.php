<?php

namespace Octante\StatsDBundle\Factory;

use Octante\StatsDBundle\Event\SetEvent;

class SetEventFactory
{
    /**
     *
     */
    public static function create()
    {
        return new SetEvent();
    }
}