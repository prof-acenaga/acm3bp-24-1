<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

Route::get('/', function () {

    $users = User::all();


    return view('home', compact('users'));

})->name('/');

Route::get('contacto', function () {
    return view('contact');
})->name('contacto');
