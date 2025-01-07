<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $gateway;

    public function __construct(PayPalGateway $gateway)
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

        $status = $charge['state'] === 'approved' ? 'success' : 'failed';

        return [
            'transaction_id' => $charge['payment_id'],
            'status' => $status,
            'amount' => $charge['amount']['total'],
            'currency' => $charge['amount']['currency'],
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->gateway->verifyPayment($transactionId);
        return $payment->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->gateway->refund($transactionId);
        return $refund->state === 'completed';
    }
}
