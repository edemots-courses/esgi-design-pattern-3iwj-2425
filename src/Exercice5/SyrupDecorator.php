<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class SyrupDecorator extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Syrup";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.75;
    }
}