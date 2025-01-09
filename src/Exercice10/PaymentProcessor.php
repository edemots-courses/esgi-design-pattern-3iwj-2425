<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

class PaymentProcessor
{
    private ?PaymentMethod $paymentMethod = null;

    public function setPaymentMethod(PaymentMethod $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function processPayment(float $amount): array
    {
        if (!$this->paymentMethod) {
            throw new \InvalidArgumentException("Payment method not set.");
        }
        return $this->paymentMethod->pay($amount);
    }
}
