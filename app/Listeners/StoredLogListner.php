<?php

namespace App\Listeners;

use App\Events\StoredLogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoredLogListner
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
    public function handle(StoredLogEvent $event): void
    {
        $log = $event->log;
        echo('Начинаем обработку события');
        echo("\n");
    }
}
