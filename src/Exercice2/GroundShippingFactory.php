<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new GroundShipping();
    }
}

class GroundShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 10 + ($distance * 0.5) + ($weight * 1);
    }

    public function getEstimatedDays(): array
    {
        return [3, 5];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return "GRD-{$trackingNumber}";
    }
}