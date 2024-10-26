<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;

class PaymentService
{
    /**
     * __construct function
     *
     * @param PaymentGatewayInterface $paymentGateway
     */
    public function __construct(public readonly PaymentGatewayInterface $paymentGateway){}
    /**
     * customerPayCharge function
     *
     * @param integer $amount
     * @return boolean
     */
    public function customerPayCharge(float $amount = 100): bool
    {
        $res =  $this->paymentGateway->pay($amount);
    }
}
