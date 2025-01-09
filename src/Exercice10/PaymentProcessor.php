
<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

class PaymentProcessor
{
    private PaymentMethod $paymentMethod;

    public function setPaymentMethod(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function processPayment(float $amount): array
    {
        return $this->paymentMethod->pay($amount);
    }
}
