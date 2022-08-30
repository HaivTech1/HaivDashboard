<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Indicator extends Component
{
    public $hasNotifications;

    protected $listeners = [
        'markAsRead' => 'setHasNotification',
    ];
    
    public function render(): View
    {
        return view('livewire.components.nav.indicator',[
            $this->hasNotifications = $this->setHasNotification(
                Auth::user()->unreadNotifications()->count();
            )
        ]);
    }

    public function setHasNotification(int $count): bool
    {
        return $count > 0;
    }
}
