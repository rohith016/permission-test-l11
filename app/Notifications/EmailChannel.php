<?php

namespace App\Notifications;

use App\Notifications\Contracts\NotificationChannel;
use App\Notifications\NotificationData;

class EmailChannel implements NotificationChannel
{
    /**
     * Create a new class instance.
     */
    public function send(NotificationData $notificationData)
    {

        $result = [
            'recipient' => $notificationData->getRecipient(),
            'name' => $notificationData->name,
            'phone' => $notificationData->phone
        ];


        $attachments = method_exists($notificationData, 'attachments')
        ? $notificationData->attachments()
        : [];

        if(sizeof($attachments) > 0){
            $files = [];
            foreach($attachments as $attachment){
                $files[] = $attachment;
            }

            $result['attachment'] = $files;
        }




        dd($result);
    }
}
