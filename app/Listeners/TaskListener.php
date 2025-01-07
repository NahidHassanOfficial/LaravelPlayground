<?php

namespace App\Listeners;

use App\Events\TaskEvent;
use App\Models\User;
use App\Notifications\MailNotification;

class TaskListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskEvent $event): void
    {
        $user = User::inRandomOrder()->first();
        $user->notify(new MailNotification($event));
    }
}
