<?php

require_once __DIR__ . '/vendor/autoload.php';

use EdemotsCourses\EsgiDesignPattern\Exercice1\Car;
use EdemotsCourses\EsgiDesignPattern\Exercice1\Truck;

$car = new Car();
echo "Car initial speed: " . $car->speed . " m/s\n";
echo "Car after acceleration: " . $car->accelerate() . " m/s\n";
echo "Car after acceleration again: " . $car->accelerate() . " m/s\n";
echo "Car after breaking: " . $car->breaks() . " m/s\n";

echo "\n";

$truck = new Truck();
echo "Truck initial speed: " . $truck->speed . " m/s\n";
echo "Truck after acceleration: " . $truck->accelerate() . " m/s\n";
echo "Truck after acceleration again: " . $truck->accelerate() . " m/s\n";
echo "Truck after breaking: " . $truck->breaks() . " m/s\n";