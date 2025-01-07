<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripeAdapter extends ModernPaymentAdapter
{
    public function __construct()
    {
        parent::__construct(new StripeGateway());
    }
}
