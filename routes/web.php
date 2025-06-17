<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UsermanagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LanguageController;
use App\Http\Controllers\Auth\UploadsController;
use App\Http\Controllers\DocumentManController;




//login/register
Route::get('/', [LoginController::class, 'show'])->name('login');
Route::post('/', [LoginController::class, 'Login'])->name('login');


Route::middleware(['auth'])->group(function () {
    //user student/teacher
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/Document', [HomeController::class, 'Documents'])->name('Documents');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
    Route::get('/languagecard/{id?}', [HomeController::class, 'languagecard'])->name('languagecard');


    Route::get('/upload', [HomeController::class, 'upload'])->name('upload');
    Route::post('/upload', [UploadsController::class, 'upload'])->name('upload');
    Route::get('/document/{id}/edit', [DocumentManController::class, 'editdocument'])->name('document.edit');
    Route::put('/document/{id}', [DocumentManController::class, 'updatedocument'])->name('document.update');
    Route::delete('/document/{id}', [DocumentManController::class, 'destroydocument'])->name('document.destroy');
    Route::get('/document', [HomeController::class, 'document'])->name('document');

    Route::post('/logout', [LogoutController::class, 'Logout'])->name('logout');


    //admin
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/user/{id}/edit', [AdminController::class, 'edituser'])->name('user.edit');
    Route::put('/admin/user/{id}', [AdminController::class, 'updateuser'])->name('user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroyuser'])->name('user.destroy');

    Route::get('/admin/language/{id}/edit', [AdminController::class, 'editlang'])->name('language.edit');
    Route::put('/admin/language/{id}', [AdminController::class, 'updatelang'])->name('language.update');
    Route::delete('/admin/language/{id}', [AdminController::class, 'destroylang'])->name('language.destroy');

    Route::get('/admin/languagemanager', [HomeController::class, 'languagemanager'])->name('languagemanager');
    Route::post('/admin/languagemanager', [LanguageController::class, 'languagemanager'])->name('languagemanager');


    Route::get('/usermanager', [UsermanagerController::class, 'showusermanager'])->name('usermanager');
    Route::post('/usermanager', [UsermanagerController::class, 'usermanager'])->name('usermanager');
});
