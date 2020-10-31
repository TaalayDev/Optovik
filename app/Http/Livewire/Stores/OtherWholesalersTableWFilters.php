<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Wholesaler\WholesalerController;
use Livewire\Component;

class OtherWholesalersTableWFilters extends Component
{
    public $filters = false;
    public $city = 0;

    protected $wholesalers;

    protected $listeners = [
        'filter' => 'filter',
    ];

    public function mount($filters)
    {
        $this->filters = $filters;
    }
    
    public function render()
    {
        $this->wholesalers = WholesalerController::filterSOW(auth()->user()->base_name);

        return view('livewire.stores.other-wholesalers-table-w-filters', with(['wholesalers'=>$this->wholesalers]));
    }

    public function filter($f, $v)
    {
        switch ($f)
        {
            case 'city':
                $this->city = $v;
                $this->stores = WholesalerController::filterSOW(auth()->user()->base_name, $this->city);
                break;
        }
    }
    
}
