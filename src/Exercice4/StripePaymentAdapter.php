<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $stripe;

    public function __construct() 
    {
        $this->stripe = new StripeGateway();
    }
      public function processPayment(float $amount, string $currency, array $paymentDetails): array 
      {
          if ($amount <= 0) {
              throw new \InvalidArgumentException("Payment amount must be positive");
          }

          $response = $this->stripe->charge([
              'amount' => $amount,
              'currency' => $currency
          ]);

          return [
              'transaction_id' => $response['id'],
              'status' => 'success',
              'amount' => $response['amount'],
              'currency' => $response['currency']
          ];
      }
    public function getPaymentStatus(string $transactionId): string 
    {
        $status = $this->stripe->verifyPayment($transactionId)->status;
        return $status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool 
    {
        $refund = $this->stripe->refund($transactionId);
        return $refund->status === 'refunded';
    }
}
