<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('contacto', function () {
    return view('contact');
});


Route::resource('users', UserController::class);

Route::resources([
    'users'=> UserController::class,
    'posts'=> PostController::class
]);

