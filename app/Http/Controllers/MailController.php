<?php

namespace App\Http\Controllers;

use App\Mail\OTPMailer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        Mail::to(request()->email)->send(new OTPMailer());
        return back()->with('success', 'Mail Sent');
    }
}
