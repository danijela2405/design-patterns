<?php

namespace Decorator;


use Decorator\Topping\Cheese;
use Decorator\Topping\Egg;
use Decorator\Topping\Ham;
use Decorator\Topping\Pineapple;

class PizzaBuilder
{

    /**
     * @var Pizza
     */
    private $pizza;

    /**
     * PizzaBuilder constructor.
     * @param Pizza $pizza
     */
    private function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public static function create(string $type): self
    {
        return new self(call_user_func([Pizza::class, $type]));
    }

    public function egg()
    {
        $this->pizza = new Egg($this->pizza);

        return $this;
    }

    public function ham()
    {
        $this->pizza = new Ham($this->pizza);

        return $this;
    }

    public function cheese()
    {
        $this->pizza = new Cheese($this->pizza);

        return $this;
    }

    public function pineapple()
    {
        $this->pizza = new Pineapple($this->pizza);

        return $this;
    }

    public function bake(): IngredientInterface
    {
        return $this->pizza;
    }


}