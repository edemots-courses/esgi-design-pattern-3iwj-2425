<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new AirShipping();
    }
}

class AirShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 50 + ($distance * 2) + ($weight * 3);
    }

    public function getEstimatedDays(): array
    {
        return [1, 2];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return "AIR-{$trackingNumber}";
    }
}