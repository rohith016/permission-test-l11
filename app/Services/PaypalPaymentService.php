<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;

class PaypalPaymentService implements PaymentGatewayInterface
{
    /**
     * __construct function
     *
     * @param string $apiUrl
     * @param string $currency
     */
    public function __construct(
        private  string $apiUrl = '',
        private  string $currency = '',
    ) {
        $this->apiUrl = config('payment.gateways.paypal.api_url');
        $this->currency = config('payment.gateways.paypal.currency');
    }
    /**
     * pay function
     *
     * @param float $amount
     * @return boolean
     */
    public function pay(float $amount): bool
    {
        dd('called paypal service class', $this->apiUrl, $this->currency);
        if(!$amount || $amount <= 0)
            throw new Exception("Amount must be greater than 0", 1);

        $transactionId = null;

        // call paypal api to pay amount
        $paypalResponse = Http::post($this -> apiUrl . '/payments/sale', [
            'amount' => [
                'total' => $amount,
                'currency' => $this -> currency,
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
        $paypalResponse = Http::post($this -> apiUrl . $transactionId . '/refund', [
            'amount' => [
                'total' => $amount,
                'currency' => $this -> currency,
            ],
        ]);

        if($paypalResponse->successful())
            return true;
        else
            throw new Exception($paypalResponse->json('message'), $paypalResponse->json('error'));


    }
    /**
     * generateToken function
     *
     * generate token function
     *
     * @param [type] $cardNumber
     * @param [type] $expMonth
     * @param [type] $expYear
     * @param [type] $cvc
     * @return string
     */
    public function generateToken($cardNumber, $expMonth, $expYear, $cvc): string
    {
        // call paypal api to generate token
        $paypalResponse = Http::post($this -> apiUrl. '/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);

        if($paypalResponse->successful())
            return $paypalResponse->json('access_token');
        else
            throw new Exception($paypalResponse->json('message'), $paypalResponse->json('error'));
    }
}
