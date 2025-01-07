<?php

namespace App\Notifications;

class EmailData extends NotificationData
{
    public array $attachments = [];
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?string $name,
        public ?string $recipient,
        public ?string $phone
    ){
        parent::__construct($recipient);

    }
    /**
     * toNotificationData function
     *
     * @return void
     */
    public function toNotificationData(){
        return [
            'recipient' => $this->getRecipient(),
            'name' => $this->name,
            // 'email' => $this->email,
            'phone' => $this->phone
        ];
    }

    public function subject(){
        return 'Order Shipped';
    }
    /**
     * attachments function
     *
     * @return void
     */
    public function attachmentsss(){
        return  [
            'file1',
            'file2'
        ];
    }
}
