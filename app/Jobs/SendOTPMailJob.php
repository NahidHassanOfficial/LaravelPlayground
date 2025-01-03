<?php

namespace App\Jobs;

use App\Mail\OTPMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendOTPMailJob implements ShouldQueue
{
    use Queueable;

    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->request->email == 'a@a.com') {
            throw new \Exception("this user not allowed");
        }

        Mail::to($this->request->email)->send(new OTPMailer());
        echo "mail success";
    }

    public function failed($exception)
    {
        Mail::to('failed@admin.com')->send(new OTPMailer());

    }
}
