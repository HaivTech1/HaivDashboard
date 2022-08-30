<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Indicator extends Component
{
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
        ]);
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
