<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserExportPDF extends Controller
{
     public function index() {
        $users=User::get();
        return view('livewire.components.userExportPDF',compact('users'));
    }

  public function exportPDF() {
    $users = User::all();
    $pdf = Pdf::loadView('livewire.components.userExportPDF', compact('users'));
    return $pdf->download('user' . rand(1,1000) . '.pdf');
}
}
