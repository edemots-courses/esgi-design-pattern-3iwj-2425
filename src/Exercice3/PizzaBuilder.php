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
        $this->pizza->size = $size;
        return $this;
    }

    public function setCrust(string $crust): self
    {
        $this->pizza->crust = $crust;
        return $this;
    }

    public function setSauce(?string $sauce): self
    {
        $this->pizza->sauce = $sauce;
        return $this;
    }

    public function addCheese(string $cheese): self
    {
        $this->pizza->cheese[] = $cheese;
        return $this;
    }

    public function addTopping(string $topping): self
    {
        if (count($this->pizza->toppings) >= 8) {
            throw new \Exception("Une pizza ne peut pas avoir plus de 8 garnitures.");
        }
        $this->pizza->toppings[] = $topping;
        return $this;
    }

    public function setCookingInstructions(?string $instructions): self
    {
        $this->pizza->cookingInstructions = $instructions;
        return $this;
    }

    public function build(): Pizza
    {
        if (empty($this->pizza->size) || empty($this->pizza->crust)) {
            throw new \Exception("Taille et type de croûte sont obligatoires.");
        }

        if (empty($this->pizza->cheese)) {
            throw new \Exception("Une pizza doit avoir au moins un type de fromage.");
        }

        $builtPizza = $this->pizza;
        $this->reset();
        return $builtPizza;
    }
}
