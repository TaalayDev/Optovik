<?php

namespace App\Http\Livewire\Users;

use App\Http\Controllers\UserController;
use Livewire\Component;

class Update extends Component
{
    public $uid;
    public $oldPass = '';
    public $flag = false;
    public $test = '';

    protected $user;
    
    protected $listeners = [
        'checkPass' => 'checkPass',
    ];
    
    public function mount($uid)
    {
        $this->uid = $uid;
    }
    
    public function render()
    {
        $this->user = UserController::findBy('id', $this->uid);
        $this->oldPass = $this->user->password;
        return view('livewire.users.update', with(['user'=>$this->user]));
    }
    
    public function checkPass($psw)
    {
        $this->flag = password_verify($psw, $this->oldPass) ;
    }
    
}
