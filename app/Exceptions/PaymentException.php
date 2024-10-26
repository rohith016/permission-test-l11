<?php

namespace App\Exceptions;

use Log;
use Exception;

class PaymentException extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "Payment exception occurred", $code = 500)
    {
        parent::__construct($message, $code);
    }

    // Optionally, add methods to retrieve data related to the exception
    public function report()
    {
        // Log the exception or perform custom reporting
        Log::error("PaymentException: {$this->message}");
    }

    // public function render($request)
    // {
    //     // Return a custom response to the user
    //     return response()->json([
    //         'error' => $this->message,
    //         'code' => $this->code
    //     ], $this->code);
    // }
}
