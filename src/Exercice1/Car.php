<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

use PhpParser\Builder\Interface_;

interface Vehicule {
    public function accelerate(): float;
    public function break(): float;
}

class Car implements Vehicule{
    protected float $speed = 0.0;

    public function accelerate():float{   
        $this->speed += 3.5;
        return $this->speed;
    }

    public function break():float{
        $this->speed -= 5;
        if($this->speed < 0){
            $this->speed = 0;
        }
        return $this->speed;
    }

}

class Truck implements Vehicule{
    protected float $speed = 0.0;

    public function accelerate():float{
        $this->speed += 1.75;
        return $this->speed;
    }

    public function break():float{
        $this ->speed -= 2;
        if($this ->speed < 0){
            $this ->speed = 0;
        }
        return $this->speed;
    }
}