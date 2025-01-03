<?php

namespace App\Jobs;

use App\Mail\PriorityMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class sendPriorityMailJob implements ShouldQueue
{
    use Queueable;

    private $mailTo;
    public function __construct($mail)
    {
        $this->mailTo = $mail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->mailTo)->send(new PriorityMail());
    }

    public function failed($exception)
    {
        Mail::to('failed@priority.com')->send(new PriorityMail());

    }
}
