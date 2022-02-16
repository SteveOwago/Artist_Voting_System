<?php

namespace App\Listeners;

use App\Events\VoteCasted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVoteCastedNotification
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
     * @param  \App\Events\VoteCasted  $event
     * @return void
     */
    public function handle(VoteCasted $event)
    {
        //
    }
}
