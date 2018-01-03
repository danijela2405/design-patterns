<?php

namespace Decorator;

use Money\Money;

/**
 * Interface IngredientInterface
 * @package Decorator
 */
interface IngredientInterface
{
    public function getName(): string;

    public function getPrice(): Money;

    public function getToppings(): array;
}