<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $paypalGateway;

    public function __construct(PayPalGateway $paypalGateway)
    {
        $this->paypalGateway = $paypalGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Invalid amount");
        }
    
        $paypalPayment = $this->paypalGateway->makePayment([
            'amount' => $amount,
            'currency' => $currency,
            'email' => $paymentDetails['email'] ?? null,
        ]);
    
        return [
            'transaction_id' => $paypalPayment['payment_id'],
            'status' => $paypalPayment['state'] === 'approved' ? 'success' : 'failed',
            'amount' => $paypalPayment['amount']['total'],
            'currency' => $paypalPayment['amount']['currency'],
            'timestamp' => $paypalPayment['create_time'],
        ];
    }
    

    public function getPaymentStatus(string $transactionId): string
    {
        $payment = $this->paypalGateway->verifyPayment($transactionId);
        return $payment->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $refund = $this->paypalGateway->refund($transactionId);
        return $refund->state === 'completed';
    }
}
