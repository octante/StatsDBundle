<?php

namespace Octante\StatsDBundle\Event;

class SetEvent extends DataEvent
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return 'set';
    }
}