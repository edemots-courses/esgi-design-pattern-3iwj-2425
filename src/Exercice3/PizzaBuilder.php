<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class PizzaBuilder implements CanBuildPizza
{
    private Pizza $pizza;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): self
    {
        $this->pizza = new Pizza();
        return $this;
    }

    public function setSize(string $size): self
    {
        $this->pizza->setSize($size);
        return $this;
    }

    public function setCrustType(string $crustType): self
    {
        $this->pizza->setCrustType($crustType);
        return $this;
    }

    public function setSauce(string $sauce): self
    {
        $this->pizza->setSauce($sauce);
        return $this;
    }

    public function addCheese(string $cheese): self
    {
        $this->pizza->addCheese($cheese);
        return $this;
    }

    public function addTopping(string $topping): self
    {
        $this->pizza->addTopping($topping);
        return $this;
    }

    public function setCookingInstructions(string $instructions): self
    {
        $this->pizza->setCookingInstructions($instructions);
        return $this;
    }

    public function build(): Pizza
    {
        $builtPizza = $this->pizza;
        $this->reset();
        return $builtPizza;
    }
}