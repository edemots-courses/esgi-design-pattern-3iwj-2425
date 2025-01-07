<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    private CanBuildPizza $builder;

    public function setBuilder(CanBuildPizza $builder): void
    {
        $this->builder = $builder;
    }

    public function makeMargherita(): Pizza
    {
        return $this->builder
            ->setSize('medium')
            ->setCrust('thin')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->build();
    }

    public function makePepperoni(): Pizza
    {
        return $this->builder
            ->setSize('large')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->addTopping('pepperoni')
            ->build();
    }

    public function makeVegetarian(): Pizza
    {
        return $this->builder
            ->setSize('medium')
            ->setCrust('thick')
            ->setSauce('tomato')
            ->addCheese('mixed')
            ->addTopping('bell peppers')
            ->addTopping('mushrooms')
            ->addTopping('onions')
            ->build();
    }
}
