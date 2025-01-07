<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class SeaShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new SeaShipping();
    }
}

class SeaShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 30 + ($distance * 0.3) + ($weight * 0.5);
    }

    public function getEstimatedDays(): array
    {
        return [7, 14];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return "SEA-{$trackingNumber}";
    }
}