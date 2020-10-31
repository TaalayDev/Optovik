<?php

namespace App\Http\Livewire\Users;

use App\Http\Controllers\UserController;
use Livewire\Component;

class TableWFilters extends Component
{
    public $filters = false;
    public $searchText = '';
    public $role = '';

    protected $users;

    protected $listeners = [
        'filter' => 'filter',
        'delete' => 'delete',
    ];

    public function mount($filters, $searchText = '')
    {
        $this->filters = $filters;
        $this->searchText = $searchText;
        
        $this->users = UserController::getAll();
    }
    
    public function render()
    {
        return view('livewire.users.table-w-filters', with(['users'=>$this->users]));
    }

    public function filter($f, $v)
    {
        $uc = new UserController();
        switch ($f)
        {
            case 'role':
                $this->role = $v;
                $this->users = $this->role == 'all' ? $uc->getAll() : $uc->findBy('role', $this->role);
                break;
        }
    }

    public function delete($id)
    {
        $uc = new UserController();
        $uc->delete($id);
        $this->users = $this->role == 'all' ? $uc->getAll() : $uc->findBy('role', $this->role);
    }
    
}
