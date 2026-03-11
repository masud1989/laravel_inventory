<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Admin Route 
 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class,'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class,'StoreProfile'])->name('store.profile');
    Route::post('/change/password', [AdminController::class,'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class,'UpdatePassword'])->name('update.password');
   
});
