<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    public string $size;
    public string $crust;
    public ?string $sauce;
    public array $cheese;
    public array $toppings;
    public ?string $cookingInstructions;

    public function __construct()
    {
        $this->toppings = [];
    }
}