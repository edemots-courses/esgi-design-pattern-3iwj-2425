<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

interface ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float;

    public function getEstimatedDays(): array;

    public function formatTracking(string $trackingNumber): string;
}

class AirShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 50 + (2 * $distance) + (3 * $weight);
    }

    public function getEstimatedDays(): array
    {
        return ['min' => 1, 'max' => 2];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'AIR-' . $trackingNumber;
    }
}

class GroundShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 10 + (0.5 * $distance) + (1 * $weight);
    }

    public function getEstimatedDays(): array
    {
        return ['min' => 3, 'max' => 5];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'GRD-' . $trackingNumber;
    }
}

class SeaShipping implements ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float
    {
        return 30 + (0.3 * $distance) + (0.5 * $weight);
    }

    public function getEstimatedDays(): array
    {
        return ['min' => 7, 'max' => 14];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'SEA-' . $trackingNumber;
    }
}

class GroundShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new GroundShipping();
    }
}

class AirShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new AirShipping();
    }
}

class SeaShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new SeaShipping();
    }
}
