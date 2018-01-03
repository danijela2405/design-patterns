<?php

namespace Composite;

use Money\Money;
use ValueObject\Mass;

class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Money
     */
    private $unitPrice;
    /**
     * @var Mass
     */
    private $mass;

    /**
     * Product constructor.
     * @param string $name
     * @param Money $unitPrice
     * @param Mass $mass
     */
    public function __construct($name, Money $unitPrice, Mass $mass)
    {
        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->mass = $mass;
    }


    public static function physical($name, Money $unitPrice, Mass $mass): self
    {
        return new self($name, $unitPrice, $mass);
    }

    public static function digital($name, Money $unitPrice): self
    {
        return new self($name, $unitPrice,  Mass::fromString('0 g'));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Money
     */
    public function getUnitPrice(): Money
    {
        return $this->unitPrice;
    }

    /**
     * @param Money $unitPrice
     */
    public function setUnitPrice(Money $unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return Mass
     */
    public function getMass(): Mass
    {
        return $this->mass;
    }

    /**
     * @param Mass $mass
     */
    public function setMass(Mass $mass)
    {
        $this->mass = $mass;
    }
}