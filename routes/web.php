<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('/');

Route::get('contacto', function () {
    return view('contact');
})->name('contacto');
