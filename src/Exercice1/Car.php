<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;
interface Vehicule {
    public function accelerate(): float;
    public function brake(): float;
}
class Car implements vehicule
{
    protected float $speed;

    public function __construct() {
        $this->speed = 0.0; 
    }

    public function accelerate(): float {
        $this->speed += 3.5; 
        return $this->speed;
    }

    public function brake(): float {
        $this->speed -= 5.0; 
        if ($this->speed < 0) {
            $this->speed = 0; 
        }
        return $this->speed;
    }
}

class Truck implements Vehicule {
    protected float $speed;

    public function __construct() {
        $this->speed = 0.0; 
    }

    public function accelerate(): float {
        $this->speed += 1.75; 
        return $this->speed;
    }

    public function brake(): float {
        $this->speed -= 2.0; 
        if ($this->speed < 0) {
            $this->speed = 0; 
        }
        return $this->speed;
    }
}
