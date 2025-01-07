<?php

namespace App\Notifications;

abstract class NotificationData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?string $recipient
    ){}

    abstract public function toNotificationData();


    public function getRecipient(){
        return $this->recipient;
    }




}
