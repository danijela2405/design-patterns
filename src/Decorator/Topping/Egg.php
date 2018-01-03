<?php
namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Currency;
use Money\Money;

class Egg extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, new Money(10, new Currency('EUR')));
    }

    public function getName(): string
    {
        return 'egg';
    }
}