<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

class Car {
    protected float $speed = 0; 

    public function accelerate(): float {
        $this->speed += 3.5; 
        return $this->speed;
    }

    public function break(): float {
        $this->speed -= 5; 
        if ($this->speed < 0) {
            $this->speed = 0; 
        }
        return $this->speed;
    }
}

