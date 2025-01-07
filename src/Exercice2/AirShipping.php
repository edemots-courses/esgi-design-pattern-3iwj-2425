<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShipping implements ShippingMethod
{
    public int $basicFee = 50;
    public float $costByWeight = 3;
    public float $costByDistance = 2;
    public float $cost = 0;
    public array $estimateDate = [1,2];
    public string $prefix = "AIR";
    public string $formatTracking = "123456";

    public function calculateCost(float $weight, float $distance): float
    {
        return $this->cost = $this->basicFee + ($weight * $this->costByWeight) + ($distance * $this->costByDistance);
    }

    public function getEstimatedDays(): array
    {
        return $this->estimateDate;
    }

    public function formatTracking(string $trackingNumber): string
    {
        return $this->prefix . "-" . $this->formatTracking;
    }
}