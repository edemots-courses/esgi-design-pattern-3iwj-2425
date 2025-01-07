<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    public string $size;
    public string $crust;
    public string $sauce;
    public array $cheese = [];
    public array $toppings = [];
    public string $cookingInstructions;

    public function describe(): string
    {
        return sprintf(
            "Pizza %s avec croûte %s, sauce %s, fromages: [%s], garnitures: [%s], cuisson: %s",
            $this->size,
            $this->crust,
            $this->sauce ?? 'aucune',
            implode(', ', $this->cheese),
            implode(', ', $this->toppings),
            $this->cookingInstructions ?? 'standard'
        );
    }
}
