<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Wholesaler\WholesalerController;
use Livewire\Component;

class Update extends Component
{
    public $wid = 0;
    
    protected $wholesaler;
    
    public function mount($wid)
    {
        $this->wid = $wid;
        $this->wholesaler = WholesalerController::findBy('id', $wid);
    }
    
    public function render()
    {
        return view('livewire.wholesalers.update', with(['wholesaler'=>$this->wholesaler]));
    }
}
