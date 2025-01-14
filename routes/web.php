<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/otp-mail', [MailController::class, 'sendMail']);
Route::post('/priority-mail', [MailController::class, 'sendPriorityMail']);

Route::get('/task', function () {
    return view('task');
});
Route::post('/task-complete', [TaskController::class, 'taskComplete']);

Route::get('/newsletter', function () {
    return view('newsletter');
});
Route::post('/send-newsletter', [NewsletterController::class, 'sendLetter']);
Route::get('/unsubscribe/{userID}', [NewsletterController::class, 'unsubscribeNewsletter'])->name('unsubscribeNewsletter')->middleware('signed');
