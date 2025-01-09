<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private string $size;
    private string $crustType;
    private ?string $sauce;
    private array $cheeses;
    private array $toppings;
    private ?string $cookingInstructions;

    public function __construct(
        string $size,
        string $crustType,
        ?string $sauce,
        array $cheeses,
        array $toppings,
        ?string $cookingInstructions
    ) {
        $this->size = $size;
        $this->crustType = $crustType;
        $this->sauce = $sauce;
        $this->cheeses = $cheeses;
        $this->toppings = $toppings;
        $this->cookingInstructions = $cookingInstructions;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getCrustType(): string
    {
        return $this->crustType;
    }

    public function getSauce(): ?string
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

    public function getCookingInstructions(): ?string
    {
        return $this->cookingInstructions;
    }
}
