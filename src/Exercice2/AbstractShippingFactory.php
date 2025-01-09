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

class GroundShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new GroundShipping();
    }
}

class AirshippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new Airshipping();
    }
}

class SeaShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new SeaShipping();
    }
}