<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;

class PaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public readonly PaymentGatewayInterface $paymentGateway){}


    public function customerPayCharge(float $amount = 100): bool
    {
        $data =  $this->paymentGateway->pay($amount);

        dd($data);
    }
}
