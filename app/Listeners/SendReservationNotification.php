<?php

namespace App\Listeners;

use App\Events\NewReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendReservationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewReservation  $event
     * @return void
     */
    public function handle(NewReservation $event)
    {
        //
    }
}
