<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private string $size;
    private string $crust;
    private string $sauce;
    private string $cheese;
    private array $toppings = [];
    private string $cookingInstructions;

    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    public function setCrust(string $crust): void
    {
        $this->crust = $crust;
    }

    public function setSauce(string $sauce): void
    {
        $this->sauce = $sauce;
    }

    public function setCheese(string $cheese): void
    {
        $this->cheese = $cheese;
    }

    public function addTopping(string $topping): void
    {
        if (count($this->toppings) < 8) {
            $this->toppings[] = $topping;
        }
    }

    public function setCookingInstructions(string $instructions): void
    {
        $this->cookingInstructions = $instructions;
    }

    public function __toString(): string
    {
        return "Pizza: $this->size, $this->crust crust, $this->sauce sauce, $this->cheese cheese, Toppings: " . implode(', ', $this->toppings) . ", Cooking Instructions: $this->cookingInstructions";
    }
}

