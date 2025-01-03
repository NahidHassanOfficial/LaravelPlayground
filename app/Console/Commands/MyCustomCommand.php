<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:abraca-dabra';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this generates a random magical words';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $magicalWords = Collect(['spiderman', 'batman', 'superman']);

        echo $magicalWords->random();
    }
}
