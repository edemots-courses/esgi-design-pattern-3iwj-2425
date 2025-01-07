<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripeAdapter implements LegacyPaymentProcessor
{
    private $stripeGateway;

    public function __construct(StripeGateway $stripeGateway)
    {
        $this->stripeGateway = $stripeGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("The payment amount must be greater than 0.");
        }

        $paymentData = [
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails
        ];

        $response = $this->stripeGateway->charge($paymentData);

        if ($response['status'] !== 'succeeded') {
            throw new \RuntimeException("Payment failed through Stripe.");
        }

        return [
            'transaction_id' => $response['id'],
            'status' => $response['status'],
            'amount' => $response['amount'],
            'currency' => $response['currency']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->stripeGateway->verifyPayment($transactionId);
        return $payment->status;
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->stripeGateway->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
