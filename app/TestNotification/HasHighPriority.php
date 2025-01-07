<?php

namespace App\TestNotification;

trait HasHighPriority
{
    // public function send($message)
    // {
    //     echo "Sending notification: {$message} with HIGH PRIORITY!\n";
    // }


    public function highPriorityChannel()
    {
        return 'SMS';
    }
}
