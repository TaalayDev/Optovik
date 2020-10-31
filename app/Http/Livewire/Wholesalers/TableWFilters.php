<?php

namespace App\Http\Livewire\Wholesalers;

use App\Http\Controllers\Wholesaler\WholesalerController;
use Livewire\Component;

class TableWFilters extends Component
{
    public $filters = false;
    public $searchText = 'search';
    public $city = 0;

    protected $wholesalers;

    protected $listeners = [
        'filter' => 'filter',
        'delete' => 'delete',
        'search' => 'search'
    ];

    public function mount($filters, $searchText = '')
    {
        $this->filters = $filters;
        $this->searchText = $searchText;

        $this->wholesalers = WholesalerController::getAll();
    }

    public function render()
    {
        return view('livewire.wholesalers.table-w-filters', with(['wholesalers'=>$this->wholesalers]));
    }

    public function filter($f, $v)
    {
        $wc = new WholesalerController();
        switch ($f)
        {
            case 'city':
                $this->city = $v;
                $this->wholesalers = $this->city == 0 ? $wc->getAll() : $wc->findBy('city', $this->city);
                break;
        }
    }

    public function delete($id)
    {
        $wc = new WholesalerController();
        $wc->delete($id, 0);
        $this->wholesalers = $this->city == 0 ? $wc->getAll() : $wc->findBy('city', $this->city);
    }

    public function search()
    {
        $this->searchText = 'search';
        $this->filters = false;
    }

}
