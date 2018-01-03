<?php

namespace Tests\Decorator;

use Decorator\Pizza;
use Decorator\PizzaBuilder;
use Decorator\Topping\Cheese;
use Decorator\Topping\Egg;
use Decorator\Topping\Ham;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;

class PizzaTest extends TestCase
{

    public function testPizzaBuilder()
    {
        $pizza = PizzaBuilder::create('tomato')
        ->ham()
        ->cheese()
        ->egg()
        ->bake();

        $this->assertSame(['tomato', 'ham','cheese',  'egg'], $pizza->getToppings());
        $this->assertEquals(new Money(555, new Currency('EUR')), $pizza->getPrice());
    }

    public function testSimplePizza()
    {
        $pizza = new Egg(new Ham(new Cheese(Pizza::cream())));

        $this->assertSame(['cream', 'cheese', 'ham', 'egg'], $pizza->getToppings());
        $this->assertEquals(new Money(550, new Currency('EUR')), $pizza->getPrice());
    }

    public function testTomatoPizza()
    {
        $pizza = new Egg(new Ham(new Cheese(Pizza::tomato())));

        $this->assertSame(['tomato', 'cheese', 'ham', 'egg'], $pizza->getToppings());
        $this->assertEquals(new Money(555, new Currency('EUR')), $pizza->getPrice());
    }

    public function testRawPizza()
    {
        $pizza = new Egg(new Ham(new Cheese(Pizza::raw())));

        $this->assertSame(['cheese', 'ham', 'egg'], $pizza->getToppings());
        $this->assertEquals(new Money(530, new Currency('EUR')), $pizza->getPrice());
    }
}