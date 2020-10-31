<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Wholesaler\WholesalerStoresController;
use Livewire\Component;

class OtherStoresTableWFilters extends Component
{
    public $filters = false;
    // public $searchText = '';
    public $city = 0;
    // public $state = 0;

    protected $stores;

    protected $listeners = [
        'filter' => 'filter',
    ];

    public function mount($filters)
    {
        $this->filters = $filters;
    }
    
    public function render()
    {
        $this->stores = StoreController::filterWS(auth()->user()->base_name);
        
        return view('livewire.wholesalers.other-stores-table-w-filters', with(['stores'=>$this->stores]));
    }

    public function filter($f, $v)
    {
        switch ($f)
        {
            case 'city':
                $this->city = $v;
                $this->stores = StoreController::filterWS(auth()->user()->base_name, $this->city);
                break;
        }
    }
    
}
