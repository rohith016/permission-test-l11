<?php

namespace App\TestNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class Order extends Notification implements ShouldQueue
{

    use Queueable;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
}
