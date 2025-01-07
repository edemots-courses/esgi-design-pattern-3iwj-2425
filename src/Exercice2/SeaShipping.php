<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class SeaShipping implements ShippingMethod
{
    public int $basicFee = 30;
    public float $costByWeight = 0.5;
    public float $costByDistance = 0.3;
    public float $cost = 0;
    public array $estimateDate = [7,14];
    public string $prefix = "SEA";
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