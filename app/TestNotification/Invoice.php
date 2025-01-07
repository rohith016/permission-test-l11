<?php

namespace App\TestNotification;

use App\TestNotification\Notification;

class Invoice extends Notification implements HighPriority
{
    use HasHighPriority;
}
