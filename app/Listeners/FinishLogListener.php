<?php

namespace App\Listeners;

use App\Events\FinishLogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FinishLogListener
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
    public function handle(FinishLogEvent $event): void
    {
        $log = $event->log;
        echo("Запись лога успешно завершена модель {$log->model} метод {$log->method}");
        echo("\n");
    }
}
