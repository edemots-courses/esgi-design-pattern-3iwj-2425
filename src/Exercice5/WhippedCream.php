<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class WhippedCream extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Whipped Cream";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}
