<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

abstract class AbstractShippingFactory
{
    abstract public function createShippingMethod(): ShippingMethod;

    public function getShippingInfo(float $weight, float $distance, string $trackingNumber): array
    {
        $shipping = $this->createShippingMethod();

        return [
            'cost' => $shipping->calculateCost($weight, $distance),
            'estimatedDays' => $shipping->getEstimatedDays(),
            'tracking' => $shipping->formatTracking($trackingNumber)
        ];
    }
}
class SeaShipping implements ShippingMethod
{
    public function calculateShippingCost(float $weight, float $distance): float
    {
        $baseRate = 30;
        $costPerKm = 0.3;
        $costPerKg = 0.5;

        return $baseRate + ($costPerKm * $distance) + ($costPerKg * $weight);
    }

    public function getEstimatedDeliveryTime(): string
    {
        return '7 à 14 jours';
    }

    public function formatTrackingNumber(int $trackingNumber): string
    {
        return 'SEA-' . str_pad($trackingNumber, 6, '0', STR_PAD_LEFT);
    }
}
