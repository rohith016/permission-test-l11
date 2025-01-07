<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'read_at'];

    /**
     * Cast the `data` field to an array.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Mark the notification as read.
     */
    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

    /**
     * Check if the notification is unread.
     *
     * @return bool
     */
    public function isUnread()
    {
        return $this->read_at === null;
    }
}
