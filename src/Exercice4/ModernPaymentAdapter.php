<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

abstract class ModernPaymentAdapter implements LegacyPaymentProcessor
{
    protected ModernPaymentGateway $gateway;

    public function __construct(ModernPaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Le montant du paiement doit être supérieur à 0.");
        }

        $response = $this->gateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails
        ]);

        if ($response['state'] !== 'approved' && $response['status'] !== 'succeeded') {
            throw new \RuntimeException("Le paiement a été refusé.");
        }

        return [
            'transactionId' => $response['payment_id'] ?? $response['id'],
            'status' => $response['state'] ?? $response['status']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $response = $this->gateway->verifyPayment($transactionId);

        return $response->status ?? $response->state;
    }

    public function refundPayment(string $transactionId): bool
    {
        $response = $this->gateway->refund($transactionId);

        return $response->status === 'refunded' || $response->state === 'completed';
    }
}
