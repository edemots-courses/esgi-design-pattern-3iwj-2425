<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

interface LegacyPaymentProcessor
{
    /**
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function processPayment(float $amount, string $currency, array $paymentDetails): array;

    public function getPaymentStatus(string $transactionId): string;

    public function refundPayment(string $transactionId): bool;
}


class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $payPalGateway;

    public function __construct()
    {
        $this->payPalGateway = new PayPalGateway();
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

        $response = $this->payPalGateway->charge($paymentData);

        if ($response['state'] !== 'approved') {
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
        $status = $this->payPalGateway->verifyPayment($transactionId);
        return $status->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->payPalGateway->refund($transactionId);
        return $refund->state === 'completed';
    }
}