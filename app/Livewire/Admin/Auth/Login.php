<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;
    public function render()
    {
        return view('livewire.admin.auth.login')->layout('Layout.admin-login');;
    }

    public function login() {
        
        $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admins=Auth::guard('admin')->attempt(['username'=>$this->username,'password'=>$this->password]);
        if($admins){
            $this->username ="";
            $this->password ="";
            return redirect(route('admin.dashboard'));
        }
    }
}
