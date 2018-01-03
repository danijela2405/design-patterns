<?php

namespace Tests\Composite;


use Composite\Combo;
use Composite\Product;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ValueObject\Mass;

class ComboTest extends TestCase
{

    public function testComboOfDigitalProductsHasNoMass(): void
    {
        $combo = new Combo(
            'Combo 1', [
                Product::digital('A', new Money(100, new  Currency('EUR'))),
                Product::digital('B', new Money(500, new  Currency('EUR'))),
                Product::digital('C', new Money(150, new  Currency('EUR'))),
            ]
        );

        $this->assertEquals(Mass::fromString('0 g'), $combo->getMass());
    }

    public function testComboWithFixedPrice(): void
    {
        $combo = new Combo(
            'Combo 1', [
            Product::digital('A', new Money(100, new  Currency('EUR'))),
            Product::digital('B', new Money(500, new  Currency('EUR'))),
            Product::digital('C', new Money(150, new  Currency('EUR'))),
        ],
            new Money(1500, new  Currency('EUR'))
        );

        $this->assertEquals(new Money(1500, new  Currency('EUR')), $combo->getUnitPrice());
    }

    public function testComboWithoutFixedPrice(): void
    {
        $combo = new Combo(
            'Combo 1', [
                Product::physical('A', new Money(100, new  Currency('EUR')), Mass::fromString('150 g')),
                Product::physical('B', new Money(500, new  Currency('EUR')), Mass::fromString('10 g')),
            ]
        );

        $this->assertEquals(Mass::fromString('160 g'), $combo->getMass());
        $this->assertEquals(new Money(600, new  Currency('EUR')), $combo->getUnitPrice());
    }
}