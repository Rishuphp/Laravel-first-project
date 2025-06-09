<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalTasks;
    public $totalUsers;
    public $totalCategorys;
    public $totalCompleteTasks;
    public function render()
    {
        $this->totalTasks=Task::count();
        $this->totalUsers=User::count();
        $this->totalCategorys=Category::count();
        $this->totalCompleteTasks=Task::where('id')->count('status');
        return view('livewire.admin.dashboard') ->layout  ('Layout.admin-app');
    }
}
