<?php

namespace App\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;




namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;
use Livewire\WithPagination;

class UserRegister extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $phone;
    public $edit_id;
    public $edit_fname;
    public $edit_lname;
    public $edit_email;
    public $edit_password;

    public $edit_phone;
    
 
    public function render()
    {
        $users = ModelsUser::orderBy('id', 'desc')->paginate(3);
        return view('livewire.user.auth.UserRegister', ['users' => $users])->layout('Layout.user-login');
    }

    public function resetField()
    {
        $this->fname = "";
        $this->lname = "";
        $this->email = "";
        $this->password = "";
        $this->phone = "";

        $this->edit_id = "";
        $this->edit_fname = "";
        $this->edit_lname = "";
        $this->edit_email = "";
        $this->edit_phone = "";
        $this->edit_password = "";
    }
    public function store()
    {
        
       $validated= $this->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|max:255',
            'phone' => 'required|string|max:255',

        ]);
$users = new ModelsUser();
        $users->fname = $this->fname;
        $users->lname = $this->lname;
        $users->email = $this->email;
        $users->phone = $this->phone;
        $users->password = Hash::make($this->fname);


    $users = ModelsUser::create($validated);
        if ($users->save) {
            $this->dispatch('addUser');
            $this->resetField();
            // Livewire v3 syntax
            // or $this->emit('addCategory'); for v2
        }

        // Optional: reset form fields


    }
    public function editUser($id)
    {
        $users = ModelsUser::findOrFail($id);
        $this->edit_id = $users->id;
        $this->edit_fname = $users->fname;
        $this->edit_lname = $users->lname;
        $this->edit_email = $users->email;
        $this->edit_password = $users->password;
        $this->edit_phone = $users->phone;
    }
  
    public function update() {
         $users = ModelsUser::findOrFail($this->edit_id);

     $this->validate([
       'edit_fname' => 'required|string|max:255',
            'edit_lname' => 'required|string|max:255',
            'edit_email' => 'required|string|max:255|email',
            'edit_password' => 'required|string|max:255',
          
            'edit_phone' => 'required|string|max:255',
    ]);

   
        $users->fname =$this->edit_fname;
        $users->lname =$this->edit_lname;
        $users->email =$this->edit_email;
        $users->password =$this->edit_password;
       
        $users->phone =$this->edit_phone;
    if ($users->save()) {
        $this->dispatch('updateUser'); // For v3
        // Or: $this->emit('updateCategory'); // For v2
        $this->resetField();
    }
}
  public function deleteUser($id)
    {
        $result = ModelsUser::findOrFail($id)->delete();
    }
    }

