<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

class CryptoPayment implements PaymentMethod {
    public function pay(float $amount): array {
        return [
            'method' => 'crypto',
            'amount' => $amount
        ];
    }
}
