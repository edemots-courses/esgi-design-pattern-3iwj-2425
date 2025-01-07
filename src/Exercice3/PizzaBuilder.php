<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class PizzaBuilder
{
    private $size;
    private $crust;
    private $sauce;
    private $cheese;
    private $toppings = [];
    private $cookingInstructions;

    public function setSize($size)
    {
        if (!in_array($size, ['small', 'medium', 'large'])) {
            throw new Exception("Taille invalide.");
        }
        $this->size = $size;
        return $this;
    }

    public function setCrust($crust)
    {
        if (!in_array($crust, ['thin', 'thick', 'regular'])) {
            throw new Exception("Type de croûte invalide.");
        }
        $this->crust = $crust;
        return $this;
    }

    public function setSauce($sauce)
    {
        if (!in_array($sauce, ['tomato', 'bbq', 'white'])) {
            throw new Exception("Sauce invalide.");
        }
        $this->sauce = $sauce;
        return $this;
    }

    public function setCheese($cheese)
    {
        if (!in_array($cheese, ['mozzarella', 'cheddar', 'mixed'])) {
            throw new Exception("Fromage invalide.");
        }
        $this->cheese = $cheese;
        return $this;
    }

    public function addTopping($topping)
    {
        if (count($this->toppings) < 8) {
            $this->toppings[] = $topping;
        } else {
            throw new Exception("Maximum de 8 garnitures autorisées.");
        }
        return $this;
    }

    public function setCookingInstructions($cookingInstructions)
    {
        if (!in_array($cookingInstructions, ['well done', 'normal', 'light'])) {
            throw new Exception("Instructions de cuisson invalides.");
        }
        $this->cookingInstructions = $cookingInstructions;
        return $this;
    }

    public function build()
    {
        if (!$this->size || !$this->crust || !$this->cheese) {
            throw new Exception("La taille, la croûte et le fromage sont obligatoires.");
        }
        return new Pizza($this->size, $this->crust, $this->sauce, $this->cheese, $this->cookingInstructions);
    }
}
