<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

class CreditCardPayment implements PaymentMethod {
    public function pay(float $amount): array {
        return [
            'method' => 'credit_card',
            'amount' => $amount
        ];
    }
}
