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
            ->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->build();
    }

    public function makePepperoni(): Pizza
    {
        return $this->builder
            ->reset()
            ->setSize('large')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->addTopping('pepperoni')
            ->build();
    }

    public function makeVegetarian(): Pizza
    {
        return $this->builder
            ->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mixed')
            ->addTopping('bell peppers')
            ->addTopping('onions')
            ->addTopping('olives')
            ->addTopping('mushrooms')
            ->build();
    }

    public function makeCustomPizza(
        string $size,
        string $crustType,
        string $sauce,
        array $cheeses,
        array $toppings,
        string $cookingInstructions
    ): Pizza {
        $this->builder->reset()
            ->setSize($size)
            ->setCrustType($crustType)
            ->setSauce($sauce);

        foreach ($cheeses as $cheese) {
            $this->builder->addCheese($cheese);
        }

        foreach ($toppings as $topping) {
            $this->builder->addTopping($topping);
        }

        return $this->builder
            ->setCookingInstructions($cookingInstructions)
            ->build();
    }
}