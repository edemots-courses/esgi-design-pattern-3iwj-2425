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
            throw new \InvalidArgumentException("Invalid amount");
        }

        $stripePayment = $this->stripeGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'source' => $paymentDetails['card_number'] ?? null,
        ]);

        return [
            'transaction_id' => $stripePayment['id'],
            'status' => $stripePayment['status'] === 'succeeded' ? 'success' : 'failed',
            'amount' => $amount,
            'currency' => $currency,
            'timestamp' => date('Y-m-d H:i:s', $stripePayment['created']),
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->stripeGateway->verifyPayment($transactionId);
        return $payment->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->stripeGateway->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
