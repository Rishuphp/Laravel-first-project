<?php
// app/Livewire/Admin/TaskDetails.php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as ModelsTask;
use App\Models\User;
use Livewire\Component;
use Livewire\Admin\Task;

class TaskDetails extends Component
{
    public $task;
    public $details_id;
public $details_cat_id;
public $details_user_id;
public $details_title;
public $details_description;
public $details_status;
public $details_start_date;
public $details_end_date;

    public function mount($id)
    {
        $tasks = ModelsTask::findOrFail($id);
           $this-> details_id = $tasks->id;
            $this-> details_cat_id = $tasks->cat_id;
            $this-> details_user_id = $tasks->user_id;
            $this-> details_title = $tasks->title;
            $this-> details_description = $tasks->description;
            $this-> details_status = $tasks->status;
            $this-> details_start_date = $tasks->start_date;
            $this-> details_end_date = $tasks->end_date;
        
    }

    public function render()
    {
         if(!Auth::guard('admin')->user()){

            if(!Auth::user()->id){
                   $tasks = ModelsTask::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            return view('livewire.admin.task-details', ['tasks'=>$tasks])->layout('Layout.admin-app');
            }
        }
        
    }
     public function TaskDetails($id) 
    {
         $tasks = ModelsTask::findOrFail($id);
          $this-> details_id = $tasks->id;
            $this-> details_cat_id = $tasks->cat_id;
            $this-> details_user_id = $tasks->user_id;
            $this-> details_title = $tasks->title;
            $this-> details_description = $tasks->description;
            $this-> details_status = $tasks->status;
            $this-> details_start_date = $tasks->start_date;
            $this-> details_end_date = $tasks->end_date;

           
       
    }
}
