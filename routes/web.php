<?php

use App\Http\Controllers\ExportPDF;
use App\Http\Controllers\TaskExportPDF;
use App\Http\Controllers\UserExportPDF;
use App\Livewire\Admin\Auth\ChangePassword;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Category;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Task;
use App\Livewire\Admin\UpdateProfile;
use App\Livewire\Admin\User;
use App\Livewire\User\Auth\Login as AuthLogin;
use Illuminate\Support\Facades\Route;

Route::get('/',AuthLogin::class)->name('user.login');
Route::middleware(['auth'])->group( function()  {
Route::get('/user/tasks',Task::class)->name('user.tasks');
    
});
Route::middleware(['guest'])->group( function()  {
Route::get('/',AuthLogin::class)->name('user.login');
    
});
Route::middleware(['guest:admin'])->group(function(){
    Route::get('/admin',Login::class)->name('admin.login');

});
Route::middleware(['auth:admin'])->group(function(){
   Route::prefix('/admin')->group(function(){
    
    Route::get('/dashboard',Dashboard::class)->name('admin.dashboard');
    Route::get('/category',Category::class)->name('admin.category');
    Route::get('/task',Task::class)->name('admin.task');
    Route::get('/user',User::class)->name('admin.user');
    Route::get('/change-password',ChangePassword::class)->name('admin.changePassword');
    Route::get('/update-profile',UpdateProfile::class)->name('admin.updateProfile');
    Route::get('/pdf',[ExportPDF::class,'exportPDF'])->name('admin.exportPDF');
    Route::get('/pdf',[TaskExportPDF::class,'exportPDF'])->name('admin.taskexportPDF');
    Route::get('/pdf',[UserExportPDF::class,'exportPDF'])->name('admin.userexportPDF');
   
});
});

