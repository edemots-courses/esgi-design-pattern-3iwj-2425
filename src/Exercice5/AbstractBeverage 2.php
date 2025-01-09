<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5;

abstract class AbstractBeverage implements Beverage
{
    protected float $cost;
    protected string $description;

    public function __construct(float $cost, string $description)
    {
        $this->cost = $cost;
        $this->description = $description;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
