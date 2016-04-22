<?php

namespace Octante\StatsDBundle\Event;

class CounterEvent extends DataEvent
{
    const INC = 'inc';
    const DEC = 'dec';

    /**
     * @var string
     */
    private $incrementDecrement;

    /**
     * @param $key
     *
     * @return $this
     */
    public function increment($key)
    {
        $this->incrementDecrement = self::INC;
        $this->key = $key;
    }

    /**
     * @param $key
     *
     * @return $this
     */
    public function decrement($key)
    {
        $this->incrementDecrement = self::DEC;
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getIncrementDecrement()
    {
        return $this->incrementDecrement;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return 'counter';
    }
}