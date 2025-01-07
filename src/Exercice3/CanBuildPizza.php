<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;
    public function setSize(string $size): self;
    public function setCrust(string $crust): self;
    public function setSauce(?string $sauce): self;
    public function setCheese(array $cheese): self;
    public function addTopping(string $topping): self;
    public function setCookingInstructions(?string $cookingInstructions): self;
    public function build(): Pizza;
}