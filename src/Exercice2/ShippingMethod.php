<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

interface ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float;

    public function getEstimatedDays(): array;

    public function formatTracking(string $trackingNumber): string;
}

class GroundShipping implements ShippingMethod{
    public function calculateCost(float $weight, float $distance): float
    {
        return 10 + (0.5 * $distance) + ($weight * 1);
    }

    public function getEstimatedDays(): array
    {
        return [3,5];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'GRD-'.$trackingNumber;
    }
}

class AirShipping implements ShippingMethod{
    public function calculateCost(float $weight, float $distance): float
    {
        return 50 + (2 * $distance) + (3 * $weight);
    }

    public function getEstimatedDays(): array
    {
        return [1,2];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'Air-'.$trackingNumber;
    }
}

class SeaShipping implements ShippingMethod{
    public function calculateCost (float $weight,float $distance): float
    {
        return 30 + (0.3 * $distance) + (0.5 * $$weight);
    }

    public function getEstimatedDays(): array
    {
        return [7,14];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'SEA-'.$trackingNumber;
    }

}