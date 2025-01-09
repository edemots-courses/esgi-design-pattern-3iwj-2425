<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class SyrupDecorator extends BeverageDecorator
{
    public function __construct(Beverage $beverage)
    {
        parent::__construct($beverage);
        $this->beverage->setCost(
            $this->beverage->getCost() + 0.75
        );
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' + Syrup';
    }
}
