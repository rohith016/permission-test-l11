<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;

class PaypalPaymentService implements PaymentGatewayInterface
{
    /**
     * pay function
     *
     * @param float $amount
     * @return boolean
     */
    public function pay(float $amount): bool
    {
        dd('called paypal service class');
        if(!$amount || $amount <= 0)
            throw new Exception("Amount must be greater than 0", 1);

        $transactionId = null;

        // call paypal api to pay amount
        $paypalResponse = Http::post('https://api.paypal.com/v1/payments/sale', [
            'amount' => [
                'total' => $amount,
                'currency' => 'USD',
            ],
            'description' => 'Test payment',
        ]);

        if($paypalResponse->successful())
            $transactionId = $paypalResponse->json('id');
        else
            throw new Exception($paypalResponse->json('message'), $paypalResponse->json('error'));

        return $transactionId;
    }
    /**
     * refund function
     *
     * @param integer $transactionId
     * @param float $amount
     * @return boolean
     */
    public function refund(int $transactionId, float $amount): bool
    {
        if(!$amount || $amount <= 0)
            throw new Exception("Invalid amount or amount must be greater than 0", $amount);

        if(!$transactionId)
            throw new Exception("Invalid Transaction Id", $transactionId);

        // call paypal api to refund amount
        $paypalResponse = Http::post('https://api.paypal.com/v1/payments/sale/' . $transactionId . '/refund', [
            'amount' => [
                'total' => $amount,
                'currency' => 'USD',
            ],
        ]);

        if($paypalResponse->successful())
            return true;
        else
            throw new Exception($paypalResponse->json('message'), $paypalResponse->json('error'));


    }
}
