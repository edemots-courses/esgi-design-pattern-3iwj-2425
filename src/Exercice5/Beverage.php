<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

<<<<<<< HEAD
use PhpParser\Builder\Interface_;

=======
>>>>>>> f32c51403dc3b0eb87861b1856487ab1ddf450fc
interface Beverage
{
    public function getDescription(): string;
    public function getCost(): float;
}
<<<<<<< HEAD

class Expresso implements Beverage
{
    public function getDescription(): string
    {
        return "Expresso";
    }

    public function getCost(): float
    {
        return 2.00;
    }
}

class Americano implements Beverage
{
    public function getDescription(): string
    {
        return "Americano";
    }

    public function getCost(): float
    {
        return 2.50;
    }
} 



abstract class BeverageDecorator implements Beverage
{
    protected $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    abstract public function getDescription(): string;
    abstract public function getCost(): float;
}

class MilkDecorator extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . "Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.50;
    }
}

class VegetalMilkDecorator extends BeverageDecorator
{
    public function getDescription():string
    {
        return $this->beverage->getDescription() . "VegetalMilk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}

class WhipedCreamDecorator extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . "WhipedCream";
    }
    public function getCost():float
    {
        return $this->beverage->getCost() + 1.00;
    }
}

class SyrupDecorator extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . "Syrup";
    }
    public function getCost():float
    {
        return $this->beverage->getCost() + 0.75;
    }
}
=======
>>>>>>> f32c51403dc3b0eb87861b1856487ab1ddf450fc
