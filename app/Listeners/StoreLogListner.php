<?php

namespace App\Listeners;

use App\Events\StoredUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreLogListner
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
    public function handle(StoredUserEvent $event): void
    {
        $event->user->profile()->create();
    }
}
