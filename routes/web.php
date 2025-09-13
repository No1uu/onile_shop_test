<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');


    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create' , [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');

require __DIR__.'/auth.php';
