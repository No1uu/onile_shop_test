<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminMiddleware;




Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
});

Route::prefix('/admin')->middleware(AdminMiddleware::class)->name('admin.')->group(function () {

    Route::get('/dashboard', function(){
    return view('admin.dashboard');
    })->name('dashboard');


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories','index')->name('category.index');
        Route::get('/categories/create', 'create')->name('category.create');
        Route::post('/categories/store', 'store')->name('category.store');
        Route::get('/categories/edit/{id}', 'edit')->name('category.edit');
        Route::put('/categories/{id}/update','update')->name('category.update');
        Route::get('/categories/{id}/destroy','destroy')->name('category.destroy');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products','index')->name('products');
        Route::get('/products/create', 'create')->name('product.create');
        Route::post('/products/store', 'store')->name('product.store');
        Route::get('/products/edit/{id}', 'edit')->name('product.edit');
        Route::put('/products/{id}/update','update')->name('product.update');
        Route::delete('/products/{id}/destroy','destroy')->name('product.destroy');
        Route::get('/products/{id}/show','show')->name('product.show');
        
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    


require __DIR__.'/auth.php';
