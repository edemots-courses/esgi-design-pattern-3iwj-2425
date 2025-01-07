<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1\Car;


class Car implements Vehicule
{
    protected float $speed;

    public function __construct()
    {
        $this->speed = 0.0;
    }

    public function accelerate(): float
    {
        $this->speed += 3.5;
        return $this->speed;
    }

    public function break(): float
    {
        $this->speed -= 5.0;
        if ($this->speed < 0) {
            $this->speed = 0.0;
        }
        return $this->speed;
    }
}

