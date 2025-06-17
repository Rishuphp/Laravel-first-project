<?php

namespace App\Livewire\Admin;
use App\Models\Admin as ModelsAdmin;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
class AdminRegister extends Component
{
    public $c_name;
    public $fullname;
    public $email;
    public $phone;
    public $address;
    public $username;
    public $password;
   

     use WithPagination;
   public function paginationView()  {
    return 'custom-pagination-links-view';
   }
    public function render()
    {
        $admins = ModelsAdmin::orderBy('id', 'desc')->paginate(3);
        return view('livewire.admin.admin-register', ['admins' => $admins])->layout('Layout.admin-app');
    }

    public function resetField()
    {
        $this->c_name = "";
        $this->fullname = "";
        $this->email = "";
        $this->phone = "";
        $this->address = "";
        $this->username = "";
        $this->password = "";

       
    }
    public function store()
    {
        
       $validated= $this->validate([
            'c_name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',

        ]);
$admins = new ModelsAdmin();
        $admins->c_name = $this->c_name;
        $admins->fullnamename = $this->fullname;
        $admins->email = $this->email;
        $admins->phone = $this->phone;
        $admins->address = $this->address;
        $admins->username = $this->username;
        $admins->password = Hash::make($this->fullname);


    $admins = ModelsAdmin::create($validated);
        if ($admins->save) {
            $this->dispatch('addAdmin');
            $this->resetField();
            // Livewire v3 syntax
            // or $this->emit('addCategory'); for v2
        }

        // Optional: reset form fields


    }
  
  public function deleteUser($id)
    {
        $result = ModelsAdmin::findOrFail($id)->delete();
    }
    }

    

