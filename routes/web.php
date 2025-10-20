<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserdetailController;
use App\Http\Controllers\CommentController;








Route::controller(HomeController::class)->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/result', 'search')->name('search');
    Route::get('/result/category', 'filter')->name('category.filter');
    Route::get('/product/show/{id}', 'show')->name('product.show');
});

Route::controller(CartController::class)->group(function(){
    Route::post('/cart/add', 'add')->name('cart.add');
    Route::post('/cart/remove', 'remove')->name('cart.remove');
    Route::post('/cart/clear', 'clear')->name('cart.clear');
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
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders','index')->name('orders');
        Route::get('/orders/show{id}','show')->name('order.show');
        Route::post('/order/status/paid/{id}','paid')->name('order.markPaid');
        Route::post('/order/status/unpaid/{id}','unpaid')->name('order.unpaid');

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(CartController::class)->group(function(){
        Route::get('/cart/show' , [CartController::class, 'show'])->name('cart.show');
        Route::get('/cart/history' , [CartController::class, 'history'])->name('order.history');

    });
    


    Route::controller(CheckoutController::class)->group (function(){
        Route::get('/checkout/{id}', 'index')->name('user.checkout');
        Route::get('/order/save', 'store')->name('order.save');
    });

    Route::controller(UserdetailController::class)->group(function(){
        Route::get('/user/details' , 'index')->name('details.index');
        Route::post('user/details' , 'store')->name('details.store');
        Route::get('/user/details/create' , 'create')->name('details.create');
        Route::get('/user/details/{id}' , 'show')->name('details.show');
        Route::get('/user/details/{id}/edit' , 'edit')->name('details.edit');
        Route::put('/user/details/{id}' , 'update')->name('details.update');
    });
    Route::controller(CommentController::class)->group (function(){
        Route::post('/comment/store/{id}', 'store')->name('comment.store');
    });
});



require __DIR__.'/auth.php';
