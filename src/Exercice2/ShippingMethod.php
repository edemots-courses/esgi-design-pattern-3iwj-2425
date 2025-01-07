<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

interface ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float;

    public function getEstimatedDays(): array;

    public function formatTracking(string $trackingNumber): string;
}
class GroundShipping implements ShippingMethod
{
    public function calculateShippingCost(float $weight, float $distance): float
    {
        $baseRate = 10;
        $costPerKm = 0.5;
        $costPerKg = 1;

        return $baseRate + ($costPerKm * $distance) + ($costPerKg * $weight);
    }

    public function getEstimatedDeliveryTime(): string
    {
        return '3 à 5 jours';
    }

    public function formatTrackingNumber(int $trackingNumber): string
    {
        return 'GRD-' . str_pad($trackingNumber, 6, '0', STR_PAD_LEFT);
    }
}
class AirShipping implements ShippingMethod
{
    public function calculateShippingCost(float $weight, float $distance): float
    {
        $baseRate = 50;
        $costPerKm = 2;
        $costPerKg = 3;

        return $baseRate + ($costPerKm * $distance) + ($costPerKg * $weight);
    }

    public function getEstimatedDeliveryTime(): string
    {
        return '1 à 2 jours';
    }

    public function formatTrackingNumber(int $trackingNumber): string
    {
        return 'AIR-' . str_pad($trackingNumber, 6, '0', STR_PAD_LEFT);
    }
}
