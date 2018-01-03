<?php

namespace State;


class Door
{
    private $status = 'closed';
    private $state;

    /**
     * Door constructor.
     * @param $state
     */
    public function __construct(DoorState $state)
    {
        $this->state = $state;
    }

    public function open()
    {
        $this->state = $this->state->open();
    }

    public function close()
    {
        $this->state = $this->state->close();
    }

    public function lock()
    {
        $this->state = $this->state->lock();
    }

    public function unlock()
    {
        $this->state = $this->state->unlock();
    }

}