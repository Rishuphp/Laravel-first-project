<?php

namespace App\Livewire\Admin\Auth;


use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $username;
    public $password;
    public function render()
    {
         
        return view('livewire.admin.auth.change-password')->layout('Layout.admin-app');
    }

    public function changePassword() {
        $this->validate([
            'username' =>'string',
            'password' =>'required|string',
            
        ]);
        $admins=Admin::where('username',$this->username)->first();
        if($admins){
          
            $admins->password = Hash::make($this->password);
            $admins->save();
            $this->username ="";
            $this->password ="";
            session()->flash('success','Password Change Successfully');
        }else{
             session()->flash('error','Invalid Username');
        }
    }
}
