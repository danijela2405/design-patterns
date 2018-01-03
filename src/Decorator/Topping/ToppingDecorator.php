<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

/**
 * Class ToppingDecorator
 * @package Decorator\Topping
 */
abstract class ToppingDecorator implements IngredientInterface
{
    /**
     * @var IngredientInterface
     */
    protected $ingredient;

    /**
     * @var Money
     */
    protected $unitPrice;

    /**
     * ToppingDecorator constructor.
     * @param IngredientInterface $ingredient
     * @param Money $unitPrice
     */
    public function __construct(IngredientInterface $ingredient, Money $unitPrice)
    {
        $this->ingredient = $ingredient;
        $this->unitPrice = $unitPrice;
    }

    public function getPrice(): Money
    {
        return $this->unitPrice->add($this->ingredient->getPrice());
    }

    public function getToppings(): array
    {
        return array_merge($this->ingredient->getToppings(), [$this->getName()]);
    }
}