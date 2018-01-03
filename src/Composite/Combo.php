<?php
namespace Composite;

use Assert\Assertion;
use Money\Currency;
use Money\Money;
use ValueObject\Mass;

class Combo extends Product
{
    /**
     * @var array
     */
    private $products;

    /**
     * Combo constructor.
     * @param array $products
     */
    public function __construct(string $name, array $products, Money $unitPrice = null)
    {
        Assertion::allIsInstanceOf($products, Product::class);
        Assertion::greaterOrEqualThan( count($products),2);

        parent::__construct(
            $name,
            $unitPrice ?: static::totalPrice(...$products),
            static::totalMass(...$products)
        );

        $this->products = $products;
    }

    /**
     * @param Product[] $products
     * @return Mass
     */
    private static function totalMass(Product...$products)
    {
        $total = Mass::fromString('0 g');
        foreach ($products as $product) {
            $total = $total->add($product->getMass());
        }

        return $total;
    }

    /**
     * @param Product[] $products
     * @return Money
     */
    private static function totalPrice(Product...$products)
    {
        $total = new Money(0, new  Currency('EUR'));
        foreach ($products as $product) {
            $total = $total->add($product->getUnitPrice());
        }

        return $total;
    }
}