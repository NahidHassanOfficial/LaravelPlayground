<?php

namespace App\Http\Controllers;

use App\Jobs\SendOTPMailJob;

class MailController extends Controller
{
    public function sendMail()
    {
        dispatch(new SendOTPMailJob((Object) request()->all()));
        return back()->with('success', 'Mail Sent');
    }
}
