<?php

namespace Tests\FlyWeight;

use FlyWeight\Aircraft;
use FlyWeight\AircraftSeriesFactory;
use PHPUnit\Framework\TestCase;

class AircraftTest extends TestCase
{

    public function testCreateAircraft()
    {
        $factory = new AircraftSeriesFactory();

        $aircraft1 = new Aircraft(
            $series1 = $factory->getSeries('A380'),
            'AF-1234'
        );

        $aircraft2 = new Aircraft(
            $series2 = $factory->getSeries('A380'),
            'EK-1234'
        );

        $this->assertSame($series1, $series2);
    }
}