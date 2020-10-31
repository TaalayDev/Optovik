<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Store\StoreOrdersController;
use Livewire\Component;

class ViewOrder extends Component
{
    public $orderId;

    protected $order;

    protected $listeners = [
        'complete' => 'complete',
    ];

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }
    
    public function render()
    {
        $woc = new StoreOrdersController(auth()->user()->base_name);
        $this->order = $woc->findFirst('id', $this->orderId);
        
        return view('livewire.stores.view-order', with(['order'=>$this->order]));
    }

    public function complete()
    {
        $woc = new StoreOrdersController(auth()->user()->base_name);
        $this->order = $woc->findFirst('id', $this->orderId);
        $this->order->state = 0;
        $this->order->save();
    }
    
}
