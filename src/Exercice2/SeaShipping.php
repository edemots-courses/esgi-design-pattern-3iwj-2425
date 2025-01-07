<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class SeaShipping implements ShippingMethod
{
    private const BASE_COST = 30;
    private const COST_PER_KM = 0.3;
    private const COST_PER_KG = 0.5;
    private const PREFIX = 'SEA';

    public function calculateCost(float $weight, float $distance): float
    {
        return self::BASE_COST + ($distance * self::COST_PER_KM) + ($weight * self::COST_PER_KG);
    }

    public function getEstimatedDays(): array
    {
        return [7, 14];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return self::PREFIX . '-' . $trackingNumber;
    }
}
