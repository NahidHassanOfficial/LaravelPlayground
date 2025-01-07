<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NewsLetterMailNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NewLetterMailerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:news-letter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this send newsletter periodically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        Notification::send($users, new NewsLetterMailNotification);
    }
}
