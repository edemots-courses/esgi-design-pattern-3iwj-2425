<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class VegetalMilkDecorator extends BeverageDecorator
{
    public function __construct(Beverage $beverage)
    {
        parent::__construct($beverage);
        $this->beverage->setCost(
            $this->beverage->getCost() + 1.0
        );
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' + Vegetal Milk';
    }
}
