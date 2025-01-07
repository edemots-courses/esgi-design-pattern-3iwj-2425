<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

interface LegacyPaymentProcessor
{
    public function processPayment(float $amount, string $currency, array $paymentDetails): array;
    public function getPaymentStatus(string $transactionId): string;
    public function refundPayment(string $transactionId): bool;
}
