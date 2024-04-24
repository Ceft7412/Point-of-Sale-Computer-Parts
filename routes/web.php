<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;

Route::get('admin/employee', [RegisteredUserController::class, 'create'])->name('employee');
Route::get('admin/admin', [AdminController::class, 'redirectAdmin'])->name('admin');
Route::get('admin/product', [AdminController::class, 'redirectProduct'])->name('product');
Route::get('admin/category', [CategoryController::class, 'redirectCategory'])->name('category');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('admin/employee/{id}', [RegisteredUserController::class, 'getUser'])->name('getUser');

//GET THE CATEGORY VALUE BY SPECIFIC ID
Route::get('admin/category/{id}', [CategoryController::class, 'getCategory'])->name('getCategory');



// *Category
Route::get('admin/archive/archive-category', [CategoryController::class, 'archivedCategories'])->name('archive-category');

Route::get('admin/archive/archive-employee', [AdminController::class, 'redirectArchiveEmployee'])->name('archive-employee');
Route::get('admin/archive/archive-admin', [AdminController::class, 'redirectArchiveAdmin'])->name('archive-admin');

Route::get('admin/archive/archive-product', [AdminController::class, 'redirectArchiveProduct'])->name('archive-product');
Route::middleware('auth')->group(function () {
   
    Route::get('admin/overview', [AdminController::class, 'redirectOverview'])->name('overview');
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
