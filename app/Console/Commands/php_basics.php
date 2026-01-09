<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class php_basics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $num = 10;
        echo $num;
    }
}
