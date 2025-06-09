<?php

namespace App\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user.auth.login')->layout('Layout.user-login');
    }

    public function login() {
        $this->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        $users=Auth::attempt(['email' =>$this->email,'password' =>$this->password]);
        if($users){
            $this->email="";
            $this->password="";
            return redirect(route('user.tasks'));
        }
    }
}
