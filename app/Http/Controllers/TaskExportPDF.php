<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TaskExportPDF extends Controller
{
     public function index() {
        $tasks=Task::get();
        return view('livewire.components.taskExportPDF',compact('tasks'));
    }

    public function exportPDF() {
        $tasks = Task::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('livewire.components.taskPDF', compact('tasks'));
        return $pdf->download('task' . rand(1,1000) . '.pdf');
    }
}
