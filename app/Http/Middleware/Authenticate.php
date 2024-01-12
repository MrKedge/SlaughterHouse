<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\UserAuthenticated;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $user = User::find(Auth::id());

        // Add a debug statement
        Log::info('Authenticate middleware executed.');

        if ($user) {
            $user->update(['last_seen_at' => Carbon::now()]);
            event(new UserAuthenticated($user));

            // Add another debug statement
            Log::info('last_seen_at updated.');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
