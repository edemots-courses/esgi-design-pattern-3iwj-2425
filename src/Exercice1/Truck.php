<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1\Truck;

class Truck implements Vehicule
{
    protected float $speed;

    public function __construct()
    {
        $this->speed = 0.0; // Initialisation de la vitesse à 0 m/s
    }

    public function accelerate(): float
    {
        $this->speed += 1.75; // Augmentation de la vitesse de 1.75 m/s
        return $this->speed;
    }

    public function break(): float
    {
        $this->speed -= 2.0; // Réduction de la vitesse de 2.0 m/s
        if ($this->speed < 0) {
            $this->speed = 0.0; // La vitesse ne peut pas être négative
        }
        return $this->speed;
    }
}
