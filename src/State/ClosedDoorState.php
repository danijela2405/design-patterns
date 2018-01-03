<?php

namespace State;

/**
 * Class ClosedDoorState
 * @package State
 */
class ClosedDoorState extends DoorState
{
    public function open()
    {
        return new OpenDoorState();
    }

    public function lock()
    {

        return new LockedDoorState();
    }

}