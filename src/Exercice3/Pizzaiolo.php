<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    private CanBuildPizza $builder;

    public function setBuilder(CanBuildPizza $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMargherita(){
        return $this->builder
            ->reset()
            ->setSize('Medium')
            ->setCrustType('Regular')
            ->setSauce('Tomato')
            ->addCheese(['Mozzarella'])
            ->setCookingInstructions('normal')
            ->build();
    }

    public function buildPepperoni(): Pizza
    {
        return $this->builder->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->setCheese(['mozzarella'])
            ->addTopping('pepperoni')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function buildVegetarian(): Pizza
    {
        return $this->builder->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->setCheese(['mixed'])
            ->addTopping('assorted vegetables')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function createCustomPizza(array $customization): Pizza
    {
        return $this->builder->reset()
            ->setSize($customization['size'])
            ->setCrustType($customization['crust'])
            ->setSauce($customization['sauce'])
            ->setCheese($customization['cheese'])
            ->addTopping($customization['toppings'])
            ->setCookingInstructions($customization['cookingInstructions'])
            ->build();
    }
}
