<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

interface Beverage
{
    public function getDescription(): string;
    public function getCost(): float;
}

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
    protected Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription();
    }

    public function getCost(): float
    {
        return $this->beverage->getCost();
    }
}

class Milk extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " with Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.50;
    }
}

class VegetalMilk extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " with Vegetal Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}

class WhippedCream extends BeverageDecorator // Correction du nom
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " with Whipped Cream";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}

class Syrup extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " with Syrup";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.75;
    }
}
