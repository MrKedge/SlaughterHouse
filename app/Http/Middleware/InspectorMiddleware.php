<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Events\UserAuthenticated;

class InspectorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user || in_array($user->role, ['client', 'butcher'])) {

            return redirect('/log-in')->withErrors(['error' => 'Access Denied']);
        }
        event(new UserAuthenticated(Auth::user()));
        return $next($request);
    }
}
