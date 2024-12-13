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
        Mail::to($this->request->email)->send(new OTPMailer());

    }
}
