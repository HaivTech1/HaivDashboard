<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Indicator extends Component
{
    use WithPagination;
    
    public $hasNotifications;
    public $notifications;

    protected $listeners = [
        'markAsRead' => 'setHasNotification',
    ];
    
    public function render(): View
    {
        $this->hasNotifications = $this->setHasNotification(
            Auth::user()->unreadNotifications()->count()
        );

        $this->notifications = 
        return view('livewire.components.nav.indicator',[
           'hasNotifications' => $this->hasNotifications,
           'notifications' => ,
        ]);
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
