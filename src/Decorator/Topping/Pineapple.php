<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Currency;
use Money\Money;

class Pineapple extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, new Money(50, new Currency('EUR')));
    }

    public function getName(): string
    {
        return 'pineapple';
    }
}