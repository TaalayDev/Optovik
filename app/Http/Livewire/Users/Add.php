<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Add extends Component
{
    public $role = 'wholesaler';
    public $pass = '';
    public $conf_pass = '';

    public function render()
    {
        return view('livewire.users.add');
    }

}
