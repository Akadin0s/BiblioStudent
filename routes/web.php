<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home Page Route
Route::get('/', function () {
    return view('Pages.Home');
})->name('Home');

// Contact Page Route
Route::get('/contact', function () {
    return view('Pages.contact');
})->name('contact');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
