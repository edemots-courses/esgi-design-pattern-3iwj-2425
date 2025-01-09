<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

class Americano extends AbstractBeverage
{
    public function __construct()
    {
        parent::__construct(
            cost: 2.5,
            description: 'Americano'
        );
    }
}
