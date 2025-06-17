<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Task as ModelsTask;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Task extends Component
{

public $cat_id;
public $user_id;
public $title;
public $description;
public $status;
public $start_date;
public $end_date;

public $edit_id;
public $edit_cat_id;
public $edit_user_id;
public $edit_title;
public $edit_description;
public $edit_status;
public $edit_start_date;
public $edit_end_date;



public $details_task;
public $details_user;
public $categories,$users;

 use WithPagination;
   public function paginationView()  {
    return 'custom-pagination-links-view';
   }
    public function render()
    {
        $this->users=User::all();
        $this->categories=Category::all();
        if(!Auth::guard('admin')->user()){

            if(!Auth::user()->id){
                   $tasks = ModelsTask::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            return view('livewire.admin.task', ['tasks'=>$tasks])->layout('Layout.admin-app');
            }
        }
         $tasks = ModelsTask::orderBy('id', 'desc')->paginate(3);
        return view('livewire.admin.task', ['tasks'=>$tasks])->layout('Layout.admin-app');
    }

    public function resetField()  {
            $this-> cat_id ="";
            $this-> user_id ="";
            $this-> title ="";
            $this-> description ="";
            $this-> status ="";
            $this-> start_date ="";
            $this-> end_date ="";
            
            $this-> edit_id ="";
            $this-> edit_cat_id ="";
            $this-> edit_user_id ="";
            $this-> edit_title = "" ;
            $this-> edit_description ="";
            $this-> edit_status ="";
            $this-> edit_start_date ="";
            $this-> edit_end_date ="";

           
    }

    public function store(){

         $validated= $this->validate([
            'cat_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'string'

        ]);

        $tasks = ModelsTask::create($validated);
        if($tasks){
            $this->resetField();
            $this->dispatch('addTask');
        }
    }
    public function editTask($id) 
    {
         $tasks = ModelsTask::findOrFail($id);
          $this-> edit_id = $tasks->id;
            $this-> edit_cat_id = $tasks->cat_id;
            $this-> edit_user_id = $tasks->user_id;
            $this-> edit_title = $tasks->title;
            $this-> edit_description = $tasks->description;
            $this-> edit_status = $tasks->status;
            $this-> edit_start_date = $tasks->start_date;
            $this-> edit_end_date = $tasks->end_date;
    }

    public function update($id) {
         $tasks = ModelsTask::findOrFail($id);
           
         if(Auth::check()){
             $tasks->title = $this->edit_title;
             $tasks->status = $this->edit_status;
             $tasks->cat_id = $this->edit_cat_id;
             $tasks->user_id = $this->edit_user_id;
             $tasks->description = $this->edit_description;
             $tasks->start_date = $this->edit_start_date;
             $tasks->end_date = $this->edit_end_date;
             $result=$tasks->save();
       
        if($result){
            $this->resetField();
            $this->dispatch('updateTask');
        }
    
        }else{
           
            $validate= $this->validate([
       
            'edit_cat_id' => 'required',
            'edit_user_id' => 'required',
            'edit_title' => 'required',
            'edit_description' => 'required',
            'edit_status' => 'required',
            'edit_start_date' => 'required',
            'edit_end_date' => 'required',

        ]);
        
          
           $tasks->cat_id = $this->edit_cat_id;
           $tasks->user_id = $this->edit_user_id;
           $tasks->title = $this->edit_title;
           $tasks->description = $this->edit_description;
           $tasks->status = $this->edit_status;
           $tasks->start_date = $this->edit_start_date;
           $tasks->end_date = $this->edit_end_date;
$result=$tasks->save();
       
        if($tasks){
            $this->resetField();
            $this->dispatch('updateTask');
        }
        
    }
        
          

    }
   public function TaskDetails($id)
{
   $tasks = ModelsTask::findOrFail($id);

    $isAdmin = Auth::guard('admin')->check();
    $isUser = Auth::check() && Auth::id() === $tasks->user_id;

    if ($isAdmin || $isUser) {
        $this->details_task = $tasks;
        $this->details_user = User::find($tasks->user_id);
    } else {
       $isAdmin = Auth::guard('admin')->check();
    $isUser = Auth::check() && Auth::id() === $tasks->user_id;

    if ($isAdmin || $isUser) {
        $this->details_task = $tasks;
        $this->details_user = User::find($tasks->user_id);
        abort(403, ' You are not authorized to view this task.');
    }
}
    if ($isAdmin || $isUser) {
    $this->details_task = $tasks;
    $this->details_user = User::find($tasks->user_id);
    $this->dispatch('TaskDetails');
}

}


public function deleteTask($id)
    {
        $result = ModelsTask::findOrFail($id)->delete();
    }
    
}
