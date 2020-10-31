<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Store\StoreController;
use Livewire\Component;

class Update extends Component
{
    public $sid = 0;

    protected $store;

    public function mount($sid)
    {
        $this->sid = $sid;
        $this->store = StoreController::findBy('id', $sid);
    }
    
    public function render()
    {
        return view('livewire.stores.update', with(['store'=>$this->store]));
    }
}
