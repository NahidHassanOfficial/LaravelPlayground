<?php

namespace App\Http\Controllers;

use App\Events\TaskEvent;

class TaskController extends Controller
{
    public function taskComplete()
    {
        $userMail = "john@user.com";
        event(new TaskEvent($userMail));

        return back()->with('success', 'Notification Sent');
    }
}
