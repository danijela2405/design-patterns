<?php
namespace FlyWeight;

/**
 * Class Boeing777
 * @package FlyWeight
 */
final class Boeing777 extends AircraftSeries
{
    /**
     * Boeing777 constructor.
     */
    public function __construct()
    {
        parent::__construct('Boeing', 'B777', 2);
    }
}