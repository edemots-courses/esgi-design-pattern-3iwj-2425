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
        return $this->builder->reset()
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese(['mozzarella'])
            ->build();
    }

    public function makePepperoni(): Pizza
    {
        return $this->builder->reset()
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese(['mozzarella'])
            ->addTopping('pepperoni')
            ->build();
    }

    public function makeVegetarian(): Pizza
    {
        return $this->builder->reset()
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese(['mixed'])
            ->addTopping('bell peppers')
            ->addTopping('olives')
            ->addTopping('mushrooms')
            ->build();
    }
}