<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Store\StoreWholesalersController;
use Livewire\Component;

class WholesalersTableWFilters extends Component
{
    public $filters = false;

    public $state = 0;

    protected $wholesalers;

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
        $swc = new StoreWholesalersController(auth()->user()->base_name);
        $this->wholesalers = $swc->getAll();
        
        return view('livewire.stores.wholesalers-table-w-filters', 
            with(['wholesalers'=>$this->wholesalers]));
    }

    public function filter($f, $v)
    {
        $swc = new StoreWholesalersController(auth()->user()->base_name);
        switch ($f)
        {
            case 'state':
                $this->state = $v;
                $this->wholesalers = $this->state == 0 ? $swc->getAll() : $swc->findBy('state', $v);
                break;
        }
    }

    public function delete($id)
    {
        $swc = new StoreWholesalersController(auth()->user()->base_name);
        $swc->delete(auth()->user()->base_name, $id);

        $this->wholesalers = $this->state == 0 ? $swc->getAll() : $swc->findBy('state', $this->state);
    }
    
}
