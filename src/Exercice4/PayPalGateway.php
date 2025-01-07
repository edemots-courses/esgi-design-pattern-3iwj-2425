<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalGateway implements ModernPaymentGateway
{
    public function charge(array $paymentData): array
    {
        return [
            'id' => 'pp_' . rand(1000, 9999),
            'status' => 'success',
            'amount' => $paymentData['amount']
        ];
    }

    public function verifyPayment(string $paymentId): object
    {
        return (object)[
            'status' => 'success'
        ];
    }

    public function refund(string $paymentId): object
    {
        return (object)[
            'status' => 'refunded'
        ];
    }
}
