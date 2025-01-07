<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

abstract class BeverageDecorator implements Beverage
{
    protected Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }
}