<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class VegetalMilkDecorator extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Vegetal Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}