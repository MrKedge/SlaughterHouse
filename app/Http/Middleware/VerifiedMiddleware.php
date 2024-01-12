<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyCodeMail;
use App\Events\UserAuthenticated;

class VerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = $request->user(); // Get the authenticated user

        // Check if the user is authenticated and not verified
        if ($user && !$user->hasVerifiedEmail()) {
            $verificationCode = strval(mt_rand(100000, 999999));

            // Save the verification code to the user
            $user->verify_code = $verificationCode;
            $user->save();

            // Store the user's email in the session
            session(['email' => $user->email]);

            // Send the verification code email using the VerifyCodeMail Mailable
            Mail::to($user->email)->send(new VerifyCodeMail($verificationCode, $user->first_name));

            // Redirect to the route for verifying the email account
            return redirect()->route('verify.email.account');
        }
        event(new UserAuthenticated(Auth::user()));
        // Continue to the next middleware or route handler
        return $next($request);
    }
}
