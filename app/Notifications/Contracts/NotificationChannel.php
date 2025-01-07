<?php

namespace App\Notifications\Contracts;

use App\Notifications\NotificationData;

interface NotificationChannel
{
    public function send(NotificationData $notificationdData);
}
