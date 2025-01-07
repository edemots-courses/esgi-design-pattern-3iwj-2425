<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class Milk extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.50;
    }
}
