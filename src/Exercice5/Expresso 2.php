<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class Expresso extends AbstractBeverage
{
    public function __construct()
    {
        parent::__construct(
            cost: 2.0,
            description: 'Expresso'
        );
    }
}