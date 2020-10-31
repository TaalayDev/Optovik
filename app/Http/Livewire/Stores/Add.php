<?php

namespace App\Http\Livewire\Stores;

use Livewire\Component;

class Add extends Component
{
    public $pass;
    public $conf_pass;

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.stores.add');
    }
}
