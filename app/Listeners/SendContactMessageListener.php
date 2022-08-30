<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ContactMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SendNewContactNotification;

class SendContactMessageListener implements ShouldQueue
{
    public function handle(ContactMessage $event)
    {
        
        $admins = User::where('type', User::ADMIN)->get();

        foreach ($admins as $admin) {
            $admin->notify(new SendNewContactNotification($event->contact));
        }

    }
}
