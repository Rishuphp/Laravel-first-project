<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;

class UpdateProfile extends Component
{
    public $c_name;
    public $fullname;
    public $email;
    public $phone;
    public $address;
    public $username;
    public $admins;
    public function mount()  {
        $admins= Admin::findOrFail(1);
    $this-> c_name =$admins->c_name;
    $this-> fullname=$admins->fullname;
    $this-> email=$admins->email;
    $this-> phone=$admins->phone;
    $this-> address=$admins->address;
    $this-> username=$admins->username;
    }
    public function render()
    {
        return view('livewire.admin.update-profile')->layout('Layout.admin-app');
    }

    public function update() {
        $admins= Admin::findOrFail(1);

        $this->validate([
            'c_name' => 'required|string',
     'fullname' =>'required|string',
     'email' =>'required|string',
     'phone' =>'required|string',
     'address' =>'required|string',
     'username' =>'required|string'
        ]);
          $admins-> c_name =$this->c_name;
    $admins-> fullname=$this->fullname;
    $admins-> email=$this->email;
    $admins-> phone=$this->phone;
    $admins-> address=$this->address;
    $admins-> username=$this->username;
    $admins->save();
    session()->flash('success','Profile Update Successfully');
    }
}
