<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $stripeGateway;

    public function __construct(StripeGateway $stripeGateway)
    {
        $this->stripeGateway = $stripeGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Invalid payment amount.");
        }

        $paymentData = [
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails,
        ];

        $response = $this->stripeGateway->charge($paymentData);

        if ($response['status'] !== 'succeeded') {
            throw new \RuntimeException("Payment failed.");
        }

        return [
            'transaction_id' => $response['id'],
            'status' => 'success',
            'amount' => $amount,
            'currency' => $currency,
            'timestamp' => time(),
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        
        $status = $this->stripeGateway->verifyPayment($transactionId);
        return $status->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->stripeGateway->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
