<?php
namespace FlyWeight;

/**
 * Class AircraftSeries
 * @package FlyWeight
 */
abstract class AircraftSeries
{
    /**
     * @var string
     */
    private $manufacturer;

    /**
     * @var string
     */
    private $family;

    /**
     * @var int
     */
    private $enginesCount;

    /**
     * AircraftSeries constructor.
     * @param string $manufacturer
     * @param string $family
     * @param int $enginesCount
     */
    public function __construct($manufacturer, $family, $enginesCount)
    {
        $this->manufacturer = $manufacturer;
        $this->family = $family;
        $this->enginesCount = $enginesCount;
    }

    private function __clone()
    {
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @return string
     */
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * @return int
     */
    public function getEnginesCount(): int
    {
        return $this->enginesCount;
    }
}