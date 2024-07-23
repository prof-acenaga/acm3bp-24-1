<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;


Route::get('/', function () {
    return view('index');
});

Route::get('contacto', function () {

    $posts = Post::all();

    return view('contact', compact('posts'));
});


Route::resource('users', UserController::class);



Route::middleware('auth')->group(function () {
    Route::resources([
        'users'=> UserController::class,
        'posts'=> PostController::class
    ]);
    Route::get('product/{product}', [OrderController::class, 'addProduct'])->name('product.add');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
