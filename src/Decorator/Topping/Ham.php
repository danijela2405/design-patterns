<?php

namespace Decorator\Topping;


use Decorator\IngredientInterface;
use Money\Currency;
use Money\Money;

class Ham extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, new Money(130, new Currency('EUR')));
    }

    public function getName(): string
    {
        return 'ham';
    }
}