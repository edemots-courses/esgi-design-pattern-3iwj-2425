<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    public $size;
    public $crust;
    public $sauce;
    public $cheese;
    public $toppings = [];
    public $cookingInstructions;

    public function __construct($size, $crust, $sauce, $cheese, $cookingInstructions)
    {
        $this->size = $size;
        $this->crust = $crust;
        $this->sauce = $sauce;
        $this->cheese = $cheese;
        $this->cookingInstructions = $cookingInstructions;
    }

    public function addTopping($topping)
    {
        if (count($this->toppings) < 8) {
            $this->toppings[] = $topping;
        } else {
            throw new Exception("Maximum de 8 garnitures autorisées.");
        }
    }

    public function __toString()
    {
        return "Pizza {$this->size} avec croûte {$this->crust}, sauce {$this->sauce}, fromage {$this->cheese}, garnitures : " . implode(", ", $this->toppings) . " et cuisson : {$this->cookingInstructions}.";
    }
}
