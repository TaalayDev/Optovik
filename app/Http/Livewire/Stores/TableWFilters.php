<?php

namespace App\Http\Livewire\Stores;

use App\Http\Controllers\Store\StoreController;
use Livewire\Component;

class TableWFilters extends Component
{

    public $filters = false;
    public $searchText = '';
    public $city = 0;
    
    protected $stores;
    
    protected $listeners = [
        'filter' => 'filter',
        'delete' => 'delete',
    ];
    
    public function mount($filters, $searchText = '')
    {
        $this->filters = $filters;
        $this->searchText = $searchText;

        $this->stores = StoreController::getAll();
    }
    
    public function render()
    {
        return view('livewire.stores.table-w-filters', with(['stores'=>$this->stores]));
    }

    public function filter($f, $v)
    {
        $sc = new StoreController();
        switch ($f)
        {
            case 'city':
                $this->city = $v;
                $this->stores = $this->city == 0 ? $sc->getAll() : $sc->findBy('city', $this->city);
                break;
        }
    }

    public function delete($id)
    {
        $sc = new StoreController();
        $sc->delete($id);
        $this->stores = $this->city == 0 ? $sc->getAll() : $sc->findBy('city', $this->city);
    }
    
}
