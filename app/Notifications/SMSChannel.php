<?php

namespace App\Notifications;

use App\Notifications\Contracts\NotificationChannel;

class SMSChannel implements NotificationChannel
{
    /**
     * Create a new class instance.
     */
    public function send($data)
    {
        dd($data);
        dd('Sending SMS to ');
    }
}
