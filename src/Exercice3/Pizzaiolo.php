<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    public function createMargherita()
    {
        return (new PizzaBuilder())
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese('mozzarella')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function createPepperoni()
    {
        return (new PizzaBuilder())
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese('mozzarella')
            ->addTopping('pepperoni')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function createVegetarian()
    {
        return (new PizzaBuilder())
            ->setSize('medium')
            ->setCrust('regular')
            ->setSauce('tomato')
            ->setCheese('mixed')
            ->addTopping('assorted vegetables')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function createCustomPizza($size, $crust, $sauce, $cheese, $toppings, $cookingInstructions)
    {
        $builder = new PizzaBuilder();
        $builder->setSize($size)
            ->setCrust($crust)
            ->setSauce($sauce)
            ->setCheese($cheese)
            ->setCookingInstructions($cookingInstructions);

        foreach ($toppings as $topping) {
            $builder->addTopping($topping);
        }

        return $builder->build();
    }
}
