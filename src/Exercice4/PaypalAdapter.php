<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalAdapter extends ModernPaymentAdapter
{
    public function __construct()
    {
        parent::__construct(new PayPalGateway());
    }
}
