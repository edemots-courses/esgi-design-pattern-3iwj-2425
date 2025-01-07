<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $paypalGateway;

    public function __construct(PayPalGateway $paypalGateway)
    {
        $this->paypalGateway = $paypalGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Invalid amount. Amount must be greater than zero.');
        }

        $response = $this->paypalGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails,
        ]);

        if ($response['state'] !== 'approved') {
            throw new \RuntimeException('Payment failed with PayPal.');
        }

        return [
            'transactionId' => $response['payment_id'],
            'status' => $response['state'],
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $status = $this->paypalGateway->verifyPayment($transactionId);
        return $status->state === 'approved' ? 'approved' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->paypalGateway->refund($transactionId);
        return $refund->state === 'completed';
    }
}
