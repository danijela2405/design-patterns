<?php
namespace State;

class OpenDoorState extends DoorState
{
    public function close()
    {
        return new ClosedDoorState();
    }
}