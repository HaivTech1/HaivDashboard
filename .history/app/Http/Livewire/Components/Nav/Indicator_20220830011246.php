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


    public function markAsRead(string $notificationId): void
    {
        $instance = DatabaseNotification::findOrFail($notificationId);
        $this->authorize(NotificationPolicy::MARKASREAD, $this->notification);
        $instance->markAsRead();

        $this->dispatchBrowserEvent('success', [
            'message' => 'Notification marked as read successfully',
        ]);

        $this->reset();
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
