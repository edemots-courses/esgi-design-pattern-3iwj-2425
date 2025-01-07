<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripeAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $stripeGateway;

    public function __construct(StripeGateway $stripeGateway)
    {
        $this->stripeGateway = $stripeGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Invalid amount. Amount must be greater than zero.');
        }

        $response = $this->stripeGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails,
        ]);

        if ($response['status'] !== 'succeeded') {
            throw new \RuntimeException('Payment failed with Stripe.');
        }

        return [
            'transactionId' => $response['id'],
            'status' => $response['status'],
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $status = $this->stripeGateway->verifyPayment($transactionId);
        return $status->status === 'succeeded' ? 'approved' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->stripeGateway->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
