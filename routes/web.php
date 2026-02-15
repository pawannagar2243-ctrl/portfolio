<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Ye test mail hai Laravel + SendGrid ke through!', function ($message) {
        $message->to('yourgmail@gmail.com') // yahan aapka Gmail
                ->subject('Test Mail from Laravel + SendGrid');
    });

    return 'Mail sent!';
});

Route::get('/', function () {
    return view('home');
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/admin', [AdminController::class, 'index']);
