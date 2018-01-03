<?php
/**
 * Created by PhpStorm.
 * User: danijelamikulicic
 * Date: 15/11/2017
 * Time: 15:52
 */

namespace State;


class LockedDoorState extends DoorState
{
    public function open()
    {

        return new OpenDoorState();
    }

    public function unlock()
    {
       return new UnlockedDoorState();

    }
}