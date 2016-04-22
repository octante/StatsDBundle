<?php

namespace Octante\StatsDBundle\Event;

use Liuggio\StatsDClientBundle\Exception;
use Symfony\Component\EventDispatcher\Event;

abstract class DataEvent extends Event
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var integer
     */
    protected $value;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @throws Exception
     */
    public function getEventType()
    {
        throw new Exception('This method must be implemented!');
    }
}