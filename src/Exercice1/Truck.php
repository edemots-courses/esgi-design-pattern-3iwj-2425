<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1\Truck;

class Truck implements Vehicule
{
    protected float $speed;

    public function __construct()
    {
        $this->speed = 0.0;
    }

    public function accelerate(): float
    {
        $this->speed += 1.75;
        return $this->speed;
    }

    public function break(): float
    {
        $this->speed -= 2.0;
        if ($this->speed < 0) {
            $this->speed = 0.0;
        }
        return $this->speed;
    }
}
