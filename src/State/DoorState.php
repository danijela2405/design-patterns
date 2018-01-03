<?php
namespace State;

/**
 * Class DoorState
 * @package State
 */
abstract class DoorState
{
    public function open()
    {
        throw new \Exception();
    }

    public function close()
    {

        throw new \Exception();
    }

    public function lock()
    {

        throw new \Exception();
    }

    public function unlock()
    {
        throw new \Exception();

    }
}