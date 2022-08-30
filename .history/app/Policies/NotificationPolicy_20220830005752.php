<?php

namespace App\Policies;

use App\Models\User;

class NotificationPolicy
{
    
    const MARKASREAD = 'markasread';

    public function markasread(User $user, DatabaseNotification $notification): bool
    {
        return $notification->notifiable->is($user);
    }
}
