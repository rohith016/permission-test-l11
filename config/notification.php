<?php

return [

    'data' => \App\Notifications\NotificationData::class,

    'channels' => [
        'sms' => \App\Notifications\SMSChannel::class,
        'email' => \App\Notifications\EmailChannel::class,


        'default' => new \App\Notifications\EmailChannel()
    ],

];
