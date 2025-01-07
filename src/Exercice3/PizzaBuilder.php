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

    public function setCheese(array $cheese): self
    {
        $this->pizza->cheese = $cheese;
        return $this;
    }

    public function addTopping(string $topping): self
    {
        if (count($this->pizza->toppings) < 8) {
            $this->pizza->toppings[] = $topping;
        }
        return $this;
    }

    public function setCookingInstructions(?string $cookingInstructions): self
    {
        $this->pizza->cookingInstructions = $cookingInstructions;
        return $this;
    }

    public function build(): Pizza
    {
        if (empty($this->pizza->size) || empty($this->pizza->crust) || empty($this->pizza->cheese)) {
            throw new \Exception("Missing required pizza attributes");
        }
        return $this->pizza;
    }
}