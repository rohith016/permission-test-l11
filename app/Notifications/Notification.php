<?php

namespace App\Notifications;

use App\Notifications\Contracts\NotificationChannel;
use App\Notifications\EmailChannel;
use App\Notifications\SMSChannel;

class Notification
{
    /**
     * protected variable
     *
     * @var [type]
     */
    protected $channel;
    /**
     * channel function
     *
     * @param [type] $channel
     * @return void
     */
    public static function channel($channel = null){
        if(!($channel instanceof NotificationChannel))
            throw new \Exception('Invalid channel');

        $instance = new static();
        $instance->channel = $channel;
        return $instance;
    }
    /**
     * channelType function
     *
     * @param string $channelType
     * @return void
     */
    public static function channelType(string $channelType){
        $channel = match($channelType){
            'sms' => new SMSChannel(),
            'email' => new EmailChannel(),
            default => null
        };

        return static::channel($channel);
    }
    /**
     * send function
     *
     * @param [type] $notificationData
     * @return void
     */
    public function send($notificationData){

        $this -> channel = $this->channel ??
                    config('notification.channels.default') ??
                    throw new \Exception('Default channel not found');

        $this->channel->send($notificationData);
    }
}
