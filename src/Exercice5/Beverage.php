<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

interface Beverage
{
    public function getDescription(): string;
    public function getCost(): float;

    public function setCost(float $cost): void;
}
