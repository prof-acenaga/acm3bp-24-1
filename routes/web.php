<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('contacto', function () {
    return view('contact');
});


Route::resource('users', UserController::class);

