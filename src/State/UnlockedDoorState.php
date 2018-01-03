<?php

namespace State;


class UnlockedDoorState extends DoorState
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