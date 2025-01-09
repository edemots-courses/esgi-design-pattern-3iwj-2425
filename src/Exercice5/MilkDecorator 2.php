<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class MilkDecorator extends BeverageDecorator
{
    public function __construct(Beverage $beverage)
    {
        parent::__construct($beverage);

        $this->beverage->setCost(
            $this->beverage->getCost() + 0.5
        );
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' + Milk';
    }
}
