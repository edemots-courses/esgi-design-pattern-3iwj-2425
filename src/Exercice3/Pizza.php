<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private string $size;
    private string $crustType;
    private string $sauce;
    private array $cheeses = [];
    private array $toppings = [];
    private string $cookingInstructions;

    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    public function setCrustType(string $crustType): void
    {
        $this->crustType = $crustType;
    }

    public function setSauce(string $sauce): void
    {
        $this->sauce = $sauce;
    }

    public function addCheese(string $cheese): void
    {
        $this->cheeses[] = $cheese;
    }

    public function addTopping(string $topping): void
    {
        $this->toppings[] = $topping;
    }

    public function setCookingInstructions(string $instructions): void
    {
        $this->cookingInstructions = $instructions;
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

    public function getCheeses(): array
    {
        return $this->cheeses;
    }

    public function getToppings(): array
    {
        return $this->toppings;
    }

    public function getCookingInstructions(): string
    {
        return $this->cookingInstructions;
    }
}