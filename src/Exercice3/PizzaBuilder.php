<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class PizzaBuilder implements CanBuildPizza
{
    private ?string $size = null;
    private ?string $crustType = null;
    private ?string $sauce = null;
    private array $cheeses = [];
    private array $toppings = [];
    private ?string $cookingInstructions = null;

    public function reset(): self
    {
        $this->size = null;
        $this->crustType = null;
        $this->sauce = null;
        $this->cheeses = [];
        $this->toppings = [];
        $this->cookingInstructions = null;
        return $this;
    }

    public function setSize(string $size): self
    {
        $allowedSizes = ['small', 'medium', 'large'];
        if (!in_array($size, $allowedSizes, true)) {
            throw new \InvalidArgumentException("Invalid size: $size");
        }
        $this->size = $size;
        return $this;
    }

    public function setCrustType(string $crustType): self
    {
        $allowedCrusts = ['thin', 'thick', 'regular'];
        if (!in_array($crustType, $allowedCrusts, true)) {
            throw new \InvalidArgumentException("Invalid crust type: $crustType");
        }
        $this->crustType = $crustType;
        return $this;
    }

    public function setSauce(?string $sauce): self
    {
        $allowedSauces = ['tomato', 'bbq', 'white', null];
        if (!in_array($sauce, $allowedSauces, true)) {
            throw new \InvalidArgumentException("Invalid sauce: $sauce");
        }
        $this->sauce = $sauce;
        return $this;
    }

    public function addCheese(string $cheese): self
    {
        $allowedCheeses = ['mozzarella', 'cheddar', 'mixed'];
        if (!in_array($cheese, $allowedCheeses, true)) {
            throw new \InvalidArgumentException("Invalid cheese type: $cheese");
        }
        $this->cheeses[] = $cheese;
        return $this;
    }

    public function addTopping(string $topping): self
    {
        $allowedToppings = [
            'pepperoni', 'mushrooms', 'onions', 'bell peppers',
            'olives', 'bacon', 'ham', 'pineapple', 'extra Topping',

        ];

        $this->toppings[] = $topping;
        return $this;
    }

    public function setCookingInstructions(?string $instructions): self
    {
        $allowedInstructions = ['well done', 'normal', 'light', null];
        if (!in_array($instructions, $allowedInstructions, true)) {
            throw new \InvalidArgumentException("Invalid cooking instructions: $instructions");
        }
        $this->cookingInstructions = $instructions;
        return $this;
    }

    public function build(): Pizza
    {
        if (is_null($this->size)) {
            throw new \LogicException("Size is required.");
        }

        if (is_null($this->crustType)) {
            throw new \LogicException("Crust type is required.");
        }

        if (count($this->cheeses) < 1) {
            throw new \LogicException("At least one type of cheese is required.");
        }

        if (count($this->toppings) > 8) {
            throw new \LogicException("A maximum of 8 toppings is allowed.");
        }

        $pizza = new Pizza(
            $this->size,
            $this->crustType,
            $this->sauce,
            $this->cheeses,
            $this->toppings,
            $this->cookingInstructions
        );

        $this->reset();

        return $pizza;
    }
}
