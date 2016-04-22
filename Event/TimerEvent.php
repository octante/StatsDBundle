<?php

namespace Octante\StatsDBundle\Event;

class TimerEvent extends DataEvent
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @param $key
     * @param $value
     */
    public function timing($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return 'timer';
    }
}