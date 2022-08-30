<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    
    const MARKASREAD = 'markasread';

    public function markasread(User $user, DatabaseNotification $notification): bool
    {
        dd($notification);
        return $notification->notifiable->is($user);
    }
}
