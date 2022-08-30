<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Count extends Component
{
    public $count;

    protected $listeners = [
        'markAsRead' => 'updateCount',
    ];

    public function updateCount(int $count): int
    {
        return $count;
    }

    public function render()
    {
        $this->count = Auth::user()->unreadNotifications()->count();
        
        return view('livewire.components.nav.count',[
            'count' => $this->count
        ]);
    }
}
