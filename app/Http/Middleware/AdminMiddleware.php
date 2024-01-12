<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Events\UserAuthenticated;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || in_array($user->role, ['client', 'butcher', 'inspector'])) {

            return redirect('/log-in')->withErrors(['error' => 'Access Denied']);
        }
        event(new UserAuthenticated(Auth::user()));

        return $next($request);
    }
}
