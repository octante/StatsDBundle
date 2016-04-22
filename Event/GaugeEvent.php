<?php

namespace Octante\StatsDBundle\Event;

class GaugeEvent extends DataEvent
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @param $key
     * @param $value
     */
    public function gauge($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return 'gauge';
    }
}