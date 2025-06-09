<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
 use Barryvdh\DomPDF\Facade\Pdf;


class ExportPDF extends Controller
{
    public function index() {
        $categories=Category::get();
        return view('livewire.components.exportPDF',compact('categories'));
    }

  public function exportPDF() {
    $categories = Category::all();
    $pdf = pdf::loadView('livewire.components.exportPDF', compact('categories'));
    return $pdf->download('Category' . rand(1,1000) . '.pdf');
}

}
