<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Soft deleted data dekhar jonno route
Route::get('/employees/softDeleted', [EmployeeController::class, 'softDeleted'])->name('employees.softDeleted');


// Employee resource route
Route::resource('employees', EmployeeController::class);


// Restore korar jonno route
Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');

// Permanently delete korar jonno route
Route::delete('/employees/{id}/forceDelete', [EmployeeController::class, 'forceDelete'])->name('employees.forceDelete');



require __DIR__.'/auth.php';
