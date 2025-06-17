<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportPDF extends Controller
{
     public function index() {
        $users=Category::get();
        return view('livewire.components.ExportPDF',compact('tasks'));
    }

  public function exportPDF() {
    $users = Category::all();
    $pdf = Pdf::loadView('livewire.components.ExportPDF', compact('tasks'));
    return $pdf->download('task' . rand(1,1000) . '.pdf');
}
}
