<?php

namespace App\TestNotification;

use App\TestNotification\HighPriority;

class Notification
{
    /**
     * send function
     *
     * @param [type] $message
     * @return void
     */
    public function send($message)
    {
        if ($this instanceof HighPriority) {
            $this->sendHighPriority($message);
        } else {
            $this->sendNormal($message);
        }
    }
    /**
     * sendNormal function
     *
     * @param [type] $message
     * @return void
     */
    protected function sendNormal($message)
    {
        echo "Sending notification: {$message} with normal priority.\n";
    }
    /**
     * sendHighPriority function
     *
     * @param [type] $message
     * @return void
     */
    protected function sendHighPriority($message)
    {
        // check if the class has the high priority channel method
        if (method_exists($this, 'highPriorityChannel')) {
            $channel = $this->highPriorityChannel();
        } else {
            throw new \Exception("No high priority channel found.");
        }

        echo "Sending notification: {$message} with HIGH PRIORITY Channel {$channel}!\n";

    }
}
