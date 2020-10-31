<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Store\StoreOrdersController;
use Livewire\Component;

class OrdersTableWFilters extends Component
{
    public $filters = false;
    public $state = 0;

    protected $orders;

    protected $listeners = [
        'filter' => 'filter',
        'delete' => 'delete',
    ];

    public function mount($filters)
    {
        $this->filters = $filters;
    }
    
    public function render()
    {
        $woc = new WholesalerOrdersController(auth()->user()->base_name);
        $this->orders = $woc->findBy('state', 1);
        
        return view('livewire.stores.orders-table-w-filters', with(['orders'=>$this->orders]));
    }

    public function filter($f, $v)
    {
        $soc = new StoreOrdersController(auth()->user()->base_name);
        switch ($f)
        {
            case 'state':
                $this->state = $v;
                $this->orders = $this->state == 0 ? $soc->findBy('state', 1) : $soc->findBy('state', $v);
                break;
        }
    }

    public function delete($id)
    {
        $soc = new StoreOrdersController(auth()->user()->base_name);
        $soc->delete(auth()->user()->base_name, $id);
        
        $this->orders = $this->state == 0 ? $soc->findBy('state', 1) : $soc->findBy('state', $this->state);
    }
    
}
