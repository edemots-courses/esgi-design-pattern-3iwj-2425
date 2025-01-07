<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

class Truck implements Vehicule
{
    protected float $speed = 0.0;

    public function accelerate(): float
    {
        $this->speed += 1.75;
        return $this->speed;
    }

    public function brake(): float
    {
        $this->speed -= 2.0;
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        return $this->speed;
    }
}