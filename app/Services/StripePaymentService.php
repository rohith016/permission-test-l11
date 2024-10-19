<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;

class StripePaymentService implements PaymentGatewayInterface
{
    /**
     * __construct function
     *
     * @param string $apiUrl
     * @param string $currency
     */
    public function __construct(
        private string $apiUrl = '',
        private string $currency = '',
    ) {
        $this->apiUrl = config('payment.gateways.stripe.api_url');
        $this->currency = config('payment.gateways.stripe.currency');
    }
    /**
     * pay function
     *
     * @param float $amount
     * @return boolean
     */
    public function pay(float $amount): bool
    {
        dd('called stripe service class', $this->apiUrl, $this->currency);
        if(!$amount || $amount <= 0)
            throw new Exception("Amount must be greater than 0", 1);

        $transactionId = null;

        // call stripe api to pay amount
        $stripeResponse = Http::post($this->apiUrl . '/charges', [
            'amount' => $amount,
            'currency' => $this->currency,
            'source' => 'tok_visa',
            'description' => 'Test payment',
        ]);

        if($stripeResponse->successful())
            $transactionId = $stripeResponse->json('id');
        else
            throw new Exception($stripeResponse->json('message'), $stripeResponse->json('error'));



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

        // call stripe api to refund amount
        $stripeResponse = Http::post($this->apiUrl . '/refunds', [
            'charge' => $transactionId,
            'amount' => $amount,
        ]);

        if($stripeResponse->successful())
            return true;
        else
            throw new Exception($stripeResponse->json('message'), $stripeResponse->json('error'));

    }
}
