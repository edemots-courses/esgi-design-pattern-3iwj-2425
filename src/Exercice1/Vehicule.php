<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1\Vehicule;

interface Vehicule
{
    public function accelerate(): float;
    public function break(): float;
}