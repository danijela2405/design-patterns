<?php

namespace Tests\State;


use State\Door;
use State\LockedDoorState;
use State\OpenDoorState;

class DoorTest
{
    public function testValidDoorLifeCycle()
    {
        $door = new Door(new OpenDoorState());
        $door->close();
        $door->lock();
        $door->unlock();
        $door->open();
    }

    public function testInValidDoorLifeCycle()
    {
        $door = new Door(new LockedDoorState());
        $door->open();
    }
}