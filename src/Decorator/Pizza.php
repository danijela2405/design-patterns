<?php

namespace Decorator;

use Money\Currency;
use Money\Money;

/**
 * Class Pizza
 * @package Decorator
 */
class Pizza implements IngredientInterface
{
    private const RAW = 'raw';
    private const TOMATO = 'tomato';
    private const CREAM = 'cream';

    /**
     * @var string
     */
    private $base;

    /**
     * @var Money
     */
    private $unitPrice;

    /**
     * Pizza constructor.
     * @param string $base
     * @param Money $unitPrice
     */
    private function __construct($base, Money $unitPrice)
    {
        $this->base = $base;
        $this->unitPrice = $unitPrice;
    }


    public static function cream(): self
    {
        return new self(self::CREAM, self::EUR(210));
    }

    public static function raw(): self
    {
        return new self(self::RAW, self::EUR(190));
    }

    public static function tomato(): self
    {
        return new self(self::TOMATO, self::EUR(215));
    }

    public static function EUR(int $amount): Money
    {
        return new Money($amount, new Currency('EUR'));
    }

    /**
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @return Money
     */
    public function getUnitPrice(): Money
    {
        return $this->unitPrice;
    }

    public function getName(): string
    {
        return $this->base;
    }

    public function getPrice(): Money
    {
        return $this->unitPrice;
    }

    public function getToppings(): array
    {
        if (self::RAW !== $this->base) {
            return [$this->base];
        }

        return [];
    }
}