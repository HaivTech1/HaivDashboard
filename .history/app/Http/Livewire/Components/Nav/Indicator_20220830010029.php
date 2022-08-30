<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use App\Policies\NotificationPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Indicator extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    
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
        return DatabaseNotification::findOrFail($this->notificationId);
    }

    public function markAsRead(string $notificationId): void
    {
        $this->$notificationId = $notificationId;
        $this->authorize(NotificationPolicy::MARKASREAD, $this->notification);
        $this->notification->markAsRead();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Notification marked as read successfully'
        ])
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
