<?php

namespace App\Http\Livewire\Components\Nav;

use Livewire\Component;

class Count extends Component
{
    public $count;
    
    public function render()
    {
        return view('livewire.components.nav.count');
    }
}
