<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/admin', [AdminController::class, 'index']);
