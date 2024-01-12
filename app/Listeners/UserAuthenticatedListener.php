<?php

namespace App\Listeners;

use App\Events\UserAuthenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserAuthenticatedListener
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
    public function handle(UserAuthenticated $event): void
    {
        $user = $event->getUser();


        $user->update(['last_seen_at' => now()]);

        // You can add additional actions or notifications here if needed
    }
}
