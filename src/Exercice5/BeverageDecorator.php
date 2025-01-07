<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

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

    public function setCost(float $cost): void
    {
        $this->beverage->setCost($cost);
    }
}
