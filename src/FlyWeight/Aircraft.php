<?php

namespace FlyWeight;

class Aircraft
{
    /**
     * @var string
     */
    private $registrationNumber;

    /**
     * @var AircraftSeries
     */
    private $aircraftSeries;

    /**
     * @var int
     */
    private $altitude;

    /**
     * Aircraft constructor.
     * @param string $registrationNumber
     * @param AircraftSeries $aircraftSeries
     * @param int $altitude
     */
    public function __construct(AircraftSeries $aircraftSeries, $registrationNumber,  $altitude = 0)
    {
        $this->registrationNumber = $registrationNumber;
        $this->aircraftSeries = $aircraftSeries;
        $this->altitude = $altitude;
    }

    public function getManufacturer():string {
        return $this->aircraftSeries->getManufacturer();
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @return AircraftSeries
     */
    public function getAircraftSeries(): AircraftSeries
    {
        return $this->aircraftSeries;
    }

    /**
     * @param int $altitude
     */
    public function climb(int $altitude)
    {
        $this->altitude+= $altitude;
    }

    /**
     * @param int $altitude
     */
    public function descend(int $altitude)
    {
        $this->altitude-= $altitude;
    }

    /**
     * @return int
     */
    public function getAltitude(): int
    {
        return $this->altitude;
    }


}