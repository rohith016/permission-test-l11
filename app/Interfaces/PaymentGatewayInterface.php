<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    public function pay(float $amount): bool;
    public function refund(int $transactionId, float $amount): bool;
}
