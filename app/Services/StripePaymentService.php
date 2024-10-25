<?php

namespace App\Services;

use App\Exceptions\PaymentException;
use Illuminate\Support\Facades\Http;
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
        throw new PaymentException("Amount must be greater than 0", 400);
        dd('called stripe service class', $this->apiUrl, $this->currency);
        // check if the amount is valid
        if(!$amount || $amount <= 0)
            throw new PaymentException("Amount must be greater than 0", 400);

        $transactionId = null;

        // call stripe api to pay amount
        $stripeResponse = Http::post($this->apiUrl . '/charges', [
            'amount' => $amount,
            'currency' => $this->currency,
            'source' => 'tok_visa',
            'description' => 'Test payment',
        ]);
        // return true if the response is successful else throw exception
        if($stripeResponse->successful())
            $transactionId = $stripeResponse->json('id');
        else
            throw new PaymentException($stripeResponse->json('message'), 400);



        return $transactionId;
    }
   /**
    * transactionId function
    *
    * @param integer $transactionId
    * @param float $amount
    * @return boolean
    */
    public function refund(int $transactionId, float $amount): bool
    {
        // check if the amount is valid
        if(!$amount || $amount <= 0)
            throw new PaymentException("Invalid amount or amount must be greater than 0");

        // check if the transaction id is valid
        if(!$transactionId)
            throw new PaymentException("Invalid Transaction Id");

        // call stripe api to refund amount
        $stripeResponse = Http::post($this->apiUrl . '/refunds', [
            'charge' => $transactionId,
            'amount' => $amount,
        ]);

        // return true if the response is successful else throw exception
        if($stripeResponse->successful())
            return true;
        else
            throw new PaymentException($stripeResponse->json('message') ?? "Error on refund", 400);

    }
    /**
     * generateToken function
     *
     * sample function to generate token
     *
     * @param [type] $cardNumber
     * @param [type] $expMonth
     * @param [type] $expYear
     * @param [type] $cvc
     * @return string
     */
    public function generateToken($cardNumber, $expMonth, $expYear, $cvc): string
    {
        // stripe api call to generate token
        $stripeResponse = Http::post( $this->apiUrl . '/tokens', [
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expMonth,
                'exp_year' => $expYear,
                'cvc' => $cvc,
            ],
        ]);
        // return token if the response is successful else throw exception
        if($stripeResponse->successful())
            return $stripeResponse->json('id');
        else
            throw new PaymentException(
                $stripeResponse->json('message') ?? "Error on generate toke"
            );
    }
}
