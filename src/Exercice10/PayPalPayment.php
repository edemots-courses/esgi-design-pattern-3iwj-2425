<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

class PayPalPayment implements PaymentMethod {
    public function pay(float $amount): array {
        return [
            'method' => 'paypal',
            'amount' => $amount
        ];
    }
}
