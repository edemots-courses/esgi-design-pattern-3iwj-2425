<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class PizzaBuilder implements CanBuildPizza
{
    private $size;
    private $crustType;
    private $sauce;
    private $cheese = [];
    private $toppings = [];
    private $cookingInstructions;

    public function reset(): self
    {
        $this->size = null;
        $this->crustType = null;
        $this->sauce = null;
        $this->cheese = [];
        $this->toppings = [];
        $this->cookingInstructions = null;
        return $this;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function setCrustType(string $crustType): self
    {
        $this->crustType = $crustType;
        return $this;
    }

    public function setSauce(string $sauce): self
    {
        $this->sauce = $sauce;
        return $this;
    }

    public function addCheese(string $cheese): self
    {
        $this->cheese[] = $cheese;
        return $this;
    }

    public function addTopping(string $topping): self
    {
        if (count($this->toppings) < 8) {
            $this->toppings[] = $topping;
        }
        return $this;
    }

    public function setCookingInstructions(string $instructions): self
    {
        $this->cookingInstructions = $instructions;
        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getCrustType(): string
    {
        return $this->crustType;
    }

    public function getSauce(): string
    {
        return $this->sauce;
    }

    public function getCheese(): array
    {
        return $this->cheese;
    }

    public function getToppings(): array
    {
        return $this->toppings;
    }

    public function getCookingInstructions(): string
    {
        return $this->cookingInstructions;
    }

    public function build(): Pizza
    {
        if (empty($this->size) || empty($this->crustType)) {
            throw new \Exception("La taille et la croûte sont obligatoires");
        }

        if (empty($this->cheese)) {
            throw new \Exception("La pizza doit contenir au moins un type de fromage");
        }

        return new Pizza($this->size, $this->crustType, $this->sauce, $this->cheese, $this->toppings, $this->cookingInstructions);
    }
}
