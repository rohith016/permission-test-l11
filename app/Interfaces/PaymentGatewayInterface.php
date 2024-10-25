<?php

namespace App\Interfaces;

interface PaymentGatewayInterface
{
    /**
     * pay function
     *
     * @param float $amount
     * @return boolean
     */
    public function pay(float $amount): bool;
    /**
     * refund function
     *
     * @param integer $transactionId
     * @param float $amount
     * @return boolean
     */
    public function refund(int $transactionId, float $amount): bool;
    /**
     * generateToken function
     *
     * @param [type] $cardNumber
     * @param [type] $expMonth
     * @param [type] $expYear
     * @param [type] $cvc
     * @return string
     */
    public function generateToken($cardNumber, $expMonth, $expYear, $cvc): string;

}
