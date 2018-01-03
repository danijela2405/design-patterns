<?php
/**
 * Created by PhpStorm.
 * User: danijelamikulicic
 * Date: 14/11/2017
 * Time: 13:29
 */

namespace ValueObject;


use Assert\Assertion;

class Mass
{

    /**
     * @var int
     */
    private $value;

    /**
     * Mass constructor.
     * @param int $value
     */
    public function __construct($value)
    {
        Assertion::greaterOrEqualThan($value, 0);
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        list($value, $unit) = explode(' ', $string);

        if ('g' === $unit) {
            return new self($value);
        }
        if ('kg' === $unit) {
            return new self($value * 1000);
        }
        throw new \InvalidArgumentException('Invalid unit');
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param Mass $other
     * @return Mass
     */
    public function add(Mass $other): self
    {
        return new self($other->value + $this->value);
    }


    public static function fromKilograms(float $value): self
    {
        return new self($value * 1000);
    }


}