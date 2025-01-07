<?php

namespace App;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Notifiables
{
    /**
     * Define the relationship to the notifications table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notificationsRelation(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
    /**
     * Get all notifications for the model.
     *
     * @return Collection
     */
    public function getNotificationsAttribute()
    {
        return $this->notificationsRelation()->get();
    }

    /**
     * Get unread notifications for the model.
     *
     * @return Collection
     */
    public function getUnreadNotificationsAttribute()
    {
        return $this->notificationsRelation()->whereNull('read_at')->get();
    }

    /**
     * Mark all unread notifications as read.
     */
    public function markUnreadNotificationsAsRead()
    {
        $this->notificationsRelation()->whereNull('read_at')->update(['read_at' => now()]);
    }


}
