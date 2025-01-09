
<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

interface PaymentMethod
{
    public function pay(float $amount): array;
}


class CreditCardPayment implements PaymentMethod
{
    public function pay(float $amount): array
    {
        // Logique de traitement pour les cartes de crédit
        // Appel à une API de paiement, etc.
        return ['status' => 'success', 'message' => 'Paiement par carte effectué'];
    }
}

class PayPalPayment implements PaymentMethod
{
    public function pay(float $amount): array
    {
        // Logique de traitement pour PayPal
        // Redirection vers le site PayPal, etc.
        return ['status' => 'pending', 'message' => 'En attente de confirmation PayPal'];
    }
}

class CryptoPayment implements PaymentMethod
{
    public function pay(float $amount): array
    {
        // Logique de traitement pour les crypto-monnaies
        // Utilisation d'une librairie pour les transactions blockchain, etc.
        return ['status' => 'processing', 'message' => 'Transaction en cours de validation'];
    }
}