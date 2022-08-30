<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class Indicator extends Component
{
    use WithPagination;
    use WithAuthorizeRequests;
    
    public $hasNotifications;
    public $notificationId;

    protected $listeners = [
        'markAsRead' => 'setHasNotification',
    ];
    
    public function render(): View
    {
        $this->hasNotifications = $this->setHasNotification(
            Auth::user()->unreadNotifications()->count()
        );

        return view('livewire.components.nav.indicator',[
           'hasNotifications' => $this->hasNotifications,
           'notifications' => Auth::user()->unreadNotifications()->paginate(5),
        ]);
    }

    public function getNotificationProperty(): DatabaseNotification
    {
        # code...
    }

    public function markAsRead(string $notificationId): void
    {
        $this->$notificationId = $notificationId;
        $this->authorize(NotificationPolicy::MARKASREAD, $this->notification)
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
