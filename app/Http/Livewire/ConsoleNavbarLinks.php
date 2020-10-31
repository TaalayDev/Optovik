<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConsoleNavbarLinks extends Component
{

    public static $active;

    public function mount($active)
    {
        self::$active = $active;
    }
    
    public function render()
    {
        return view('livewire.console-navbar-links');
    }

    public static function checkActive($menu)
    {
        return self::$active == $menu ? 'active' : '';
    }
    
}
