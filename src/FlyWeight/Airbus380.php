<?php
namespace FlyWeight;

/**
 * Class Airbus380
 * @package FlyWeight
 */
final class Airbus380 extends AircraftSeries
{
    /**
     * Airbus380 constructor.
     */
    public function __construct()
    {
        parent::__construct('Airbus','A380', 4);
    }
}