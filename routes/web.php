<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Database\Factories\ProductFactory;
use App\Models\Product;


Route::get('/', function () {
    return view('index');
});

Route::get('contacto', function () {
    return view('contact');
});

Route::get('productos', function () {
        $products = Product::all();
        return view('products', compact('products'));
});



Route::resource('users', UserController::class);



Route::middleware('auth')->group(function () {
    Route::resources([
        'users'=> UserController::class,
        'posts'=> PostController::class
    ]);
    Route::get('product/{product}', [OrderController::class, 'addProduct'])->name('product.add');
    Route::get('product/remove/{id}', [OrderController::class, 'removeProduct'])->name('product.remove');
    Route::get('checkout', [OrderController::class, 'showCart'])->name('checkout');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
