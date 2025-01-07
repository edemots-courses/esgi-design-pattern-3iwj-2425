<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

Interface Vehicle{
    public function accelerate();
    public function breaks();	
}

class Car implements Vehicle
{
    public float $speed;

    public function __construct()
    {
        $this->speed = 0;
    }

    public function accelerate(){
        $this->speed += 3.5;
        return $this->speed;
    }

    public function breaks(){
        $this->speed -= 5;
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        return $this->speed;
    }
}

class Truck implements Vehicle{
    public float $speed;

    public function __construct()
    {
        $this->speed = 0;
    }

    public function accelerate(){
        $this->speed += 1.75;
        return $this->speed;
    }

    public function breaks(){
        $this->speed -= 2;
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        return $this->speed;
    }
}
