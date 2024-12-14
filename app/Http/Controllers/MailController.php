<?php

namespace App\Http\Controllers;

use App\Jobs\SendOTPMailJob;
use App\Jobs\sendPriorityMailJob;

class MailController extends Controller
{
    public function sendMail()
    {
        for ($i = 0; $i < 10; $i++) {
            dispatch(new SendOTPMailJob((Object) request()->all()));
        }
        return back()->with('success', 'Mail Sent');
    }

    public function sendPriorityMail()
    {
        $mailTo = "xyz@xyz.com";
        dispatch(new sendPriorityMailJob($mailTo))->onQueue('high');
        return back()->with('success', 'Priority Mail Sent');

    }
}
