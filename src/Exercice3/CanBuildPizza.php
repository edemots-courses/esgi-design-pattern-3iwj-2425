<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;
    public function build(): Pizza;
}
