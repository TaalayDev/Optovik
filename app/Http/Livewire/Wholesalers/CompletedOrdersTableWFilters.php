<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Wholesaler\WholesalerOrdersController;
use Livewire\Component;

class CompletedOrdersTableWFilters extends Component
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
        $this->orders = $woc->findBy('state', 0);

        return view('livewire.wholesalers.completed-orders-table-w-filters', with(['orders'=>$this->orders]));
    }

    public function filter($f, $v)
    {
        $woc = new WholesalerOrdersController(auth()->user()->base_name);
        switch ($f)
        {
            case 'state':
                $this->state = $v;
                $this->orders = $this->state == 0 ? $woc->findBy('state', 0) : $woc->findBy('state', $v);
                break;
        }
    }

    public function delete($id)
    {
        $woc = new WholesalerOrdersController(auth()->user()->base_name);
        $woc->delete(auth()->user()->base_name, $id);
        $this->orders = $this->state == 0 ? $woc->findBy('state', 0) : $woc->findBy('state', $this->state);
    }

}
