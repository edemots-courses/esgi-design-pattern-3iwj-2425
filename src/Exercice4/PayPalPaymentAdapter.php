<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $paypal;

    public function __construct() 
    {
        $this->paypal = new PayPalGateway();
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array 
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Invalid amount");
        }

        $response = $this->paypal->charge([
            'amount' => $amount,
            'currency' => $currency
        ]);

        return [
            'transaction_id' => $response['id'],
            'status' => 'success',
            'amount' => $response['amount'],
            'currency' => $currency
        ];
    }

    public function getPaymentStatus(string $transactionId): string 
    {
        if (!str_starts_with($transactionId, 'pp_')) {
            return 'failed';
        }
        return 'success';
    }

    public function refundPayment(string $transactionId): bool 
    {
        $refund = $this->paypal->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
