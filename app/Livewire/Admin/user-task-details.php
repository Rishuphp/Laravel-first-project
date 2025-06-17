<?php
namespace App\Livewire\Admin;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserTaskDetails extends Component
{
    public $task;
    public $category;

    public function mount($id)
    {
        $this->task = Task::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->category = Category::find($this->task->cat_id);
    }

    public function render()
    {
        return view('livewire.admin.user-task-details');
    }
}
