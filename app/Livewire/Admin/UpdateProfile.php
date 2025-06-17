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

    // Make sure to receive the $id in mount
    public function mount()
    {
        $admin = Admin::findOrFail(1);
       
        $this->c_name = $admin->c_name;
        $this->fullname = $admin->fullname;
        $this->email = $admin->email;
        $this->phone = $admin->phone;
        $this->address = $admin->address;
        $this->username = $admin->username;
    }

    public function render()
    {
        return view('livewire.admin.update-profile')->layout('Layout.admin-app');
    }

    public function update()
    {
        $admin = Admin::findOrFail(1);
        $this->validate([
            'c_name' => 'required|string',
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'username' => 'required|string',
        ]);

        $admin->c_name = $this->c_name;
        $admin->fullname = $this->fullname;
        $admin->email = $this->email;
        $admin->phone = $this->phone;
        $admin->address = $this->address;
        $admin->username = $this->username;
        $admin->save();

        session()->has('success', 'Profile updated successfully.');
    }
}
