<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private $size;
    private $crust;
    private $sauce;
    private $cheese = [];
    private $toppings = [];
    private $cookingInstructions;

    public function __construct($size, $crust, $sauce, $cheese, $toppings, $cookingInstructions){
        $this->size = $size;
        $this->crust = $crust;
        $this->sauce = $sauce;
        $this->cheese = $cheese;
        $this->toppings = $toppings;
        $this->cookingInstructions = $cookingInstructions;
    }

    public function __toString(){
        return "Pizza {$this->size}, {$this->crust} crust, {$this->sauce} sauce, " .
            implode(', ', $this->cheese) . ", " . implode(', ', $this->toppings) .
            ", Cooking instructions: {$this->cookingInstructions}";
    }
}
