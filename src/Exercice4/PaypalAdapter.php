<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalAdapter implements LegacyPaymentProcessor
{
    private $paypalGateway;

    public function __construct(PayPalGateway $paypalGateway)
    {
        $this->paypalGateway = $paypalGateway;
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

        $response = $this->paypalGateway->charge($paymentData);

        if ($response['state'] !== 'approved') {
            throw new \RuntimeException("Payment failed through PayPal.");
        }

        return [
            'transaction_id' => $response['payment_id'],
            'status' => $response['state'],
            'amount' => $response['amount']['total'],
            'currency' => $response['amount']['currency']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->paypalGateway->verifyPayment($transactionId);
        return $payment->state;
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->paypalGateway->refund($transactionId);
        return $refund->state === 'completed';
    }
}
