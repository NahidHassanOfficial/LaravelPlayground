<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/otp-mail', [MailController::class, 'sendMail']);
Route::post('/priority-mail', [MailController::class, 'sendPriorityMail']);
