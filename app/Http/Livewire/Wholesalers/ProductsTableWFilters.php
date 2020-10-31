<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Wholesaler\WholesalerProductsController;
use Livewire\Component;

class ProductsTableWFilters extends Component
{
    public $filters = false;
    public $state = 0;

    protected $products;

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
        $wpc = new WholesalerProductsController(auth()->user()->base_name);
        $this->products = $wpc->getAll();
        
        return view('livewire.wholesalers.products-table-w-filters', with(['products' => $this->products]));
    }

    public function filter($f, $v)
    {
        $wpc = new WholesalerProductsController(auth()->user()->base_name);
        switch ($f)
        {
            case 'state':
                $this->state = $v;
                $this->products = $this->state == 0 ? $wpc->getAll() : $wpc->findBy('state', $v);
                break;
        }
    }

    public function delete($id)
    {
        $wpc = new WholesalerProductsController(auth()->user()->base_name);
        $wpc->delete(auth()->user()->base_name, $id);
        $this->products = $this->state == 0 ? $wpc->getAll() : $wpc->findBy('state', $this->state);
    }
    
}
