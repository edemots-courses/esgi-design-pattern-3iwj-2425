<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;
    /* setters, adders */
    public function setSize(string $size): self;
    public function setCrustType(string $crustType): self;
    public function setSauce(string $sauce): self;
    public function addCheese(string $cheese): self;
    public function addTopping(string $topping): self;
    public function setCookingInstructions(string $instructions): self;

    public function build(): Pizza;
}
