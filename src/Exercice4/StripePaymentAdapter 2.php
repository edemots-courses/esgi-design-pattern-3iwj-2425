<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $gateway;

    public function __construct(StripeGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Invalid amount');
        }

        $charge = $this->gateway->charge([
            'amount' => $amount,
            'currency' => $currency
        ]);

        $status = $charge['status'] === 'succeeded' ? 'success' : 'failed';

        return [
            'transaction_id' => $charge['id'],
            'status' => $status,
            'amount' => $charge['amount'],
            'currency' => $charge['currency'],
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->gateway->verifyPayment($transactionId);
        return $payment->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->gateway->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
