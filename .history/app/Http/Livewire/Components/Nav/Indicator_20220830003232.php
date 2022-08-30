<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;

class Indicator extends Component
{
    public $hasNotifications;

    protected $listeners = [
        'markAsRead' => 'setHasNotification',
    ];
    
    public function render()
    {
        return view('livewire.components.nav.indicator');
    }

    public function setHasNotification(Type $var = null)
    {
        # code...
    }
}
