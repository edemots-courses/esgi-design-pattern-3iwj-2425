<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShipping implements ShippingMethod
{
    public int $basicFee = 10;
    public float $costByWeight = 1;
    public float $costByDistance = 0.5;
    public float $cost = 0;
    public array $estimateDate = [3,5];
    public string $prefix = "GRD";
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