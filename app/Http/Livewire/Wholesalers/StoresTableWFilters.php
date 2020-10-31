<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Wholesaler\WholesalerStoresController;
use Livewire\Component;

class StoresTableWFilters extends Component
{
    public $filters = false;
    
    public $state = 0;

    protected $stores;

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
        $wsc = new WholesalerStoresController(auth()->user()->base_name);
        $this->stores = $wsc->getAll();

        return view('livewire.wholesalers.stores-table-w-filters', with(['stores'=>$this->stores]));
    }

    public function filter($f, $v)
    {
        $wsc = new WholesalerStoresController(auth()->user()->base_name);
        switch ($f)
        {
            case 'state':
                $this->state = $v;
                $this->stores = $this->state == 0 ? $wsc->getAll() : $wsc->findBy('state', $v);
                break;
        }
    }

    public function delete($id)
    {
        $wsc = new WholesalerStoresController(auth()->user()->base_name);
        $wsc->delete(auth()->user()->base_name, $id);
        
        $this->stores = $this->state == 0 ? $wsc->getAll() : $wsc->findBy('state', $this->state);
    }

}
