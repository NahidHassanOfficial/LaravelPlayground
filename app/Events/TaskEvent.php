<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userMail;
    public $msg = "Task completed";
    /**
     * Create a new event instance.
     */
    public function __construct($userMail)
    {
        $this->userMail = $userMail;
    }

}
