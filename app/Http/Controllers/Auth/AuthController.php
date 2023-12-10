<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyCodeMail;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view('auth.log-in');
    }

    public function ShowVerifyEmail(Request $request)
    {

        // $user = User::where('email', $email)->whereNotNull('verify_code')->whereNull('email_verified_at')->first();

        // if ($user) {
        // Your existing verification logic goes here
        return view('auth.verify-email'); // You need to replace 'your.verify.blade.view' with your actual view name
        // } else {
        //     // Handle the case where the user is not found or has already been verified
        //     return redirect()->route('register')->with('error', 'User not found or already verified.');
        // }
    }



    public function LogOut(Request $request)
    {
        $email = Auth::user()->email; // Get the user's email before logging out
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session(['email' => $email]);
        return redirect('log-in')->with('status', 'Logout Successful');
    }

    public function ShowSignUp()
    {
        return view('auth.sign-up');
    }

    public function StoreAccount(Request $request)
    {
        $request->validate([
            'firstName' => 'min:3|required',
            'lastName' => 'min:3|required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);


        $verificationCode = strval(mt_rand(100000, 999999));

        $user->verify_code = $verificationCode;

        $user->save();
        session(['email' => $user->email]);
        Mail::to($user->email)->send(new VerifyCodeMail($verificationCode, $user->first_name));


        return redirect()->route('verify.email.account');
    }

    //login try
    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            $user = Auth::user();
            if ($user->role === 'admin') {
                // Redirect admin to admin dashboard
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'client') {
                // Redirect client to client overview
                return redirect()->route('client.overview');
            } elseif ($user->role === 'butcher') {

                return redirect()->route('butcher.overview');
            } elseif ($user->role === 'inspector') {

                return redirect()->route('inspector.overview');
            }
        }
        return redirect()->route('log.in')->withErrors(['error' => 'Invalid email or password'])->withInput();
    }




    public function Verify(Request $request)
    {
        $verificationCode = $request->input('verification-code');
        $email = $request->input('email');

        // Retrieve user based on the email and verification code
        $user = User::where('email', $email)
            ->where('verify_code', $verificationCode)
            ->whereNull('email_verified_at')
            ->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verify_code = null;
            $user->save();
            session(['email' => $user->email]);
            return redirect()->route('log.in')->with('success', 'Verification successful');
        } else {
            return redirect()->route('verify.email.account')->with('error', 'Invalid verification code. Please try again.');
        }
    }


    public function ResendCode(Request $request)
    {
        $email = $request->input('resend-code-mail');
        $cooldownKey = 'resend_cooldown_' . $email;
        $cooldownDuration = 60; // cooldown duration in seconds (adjust as needed)

        // Check if cooldown is active
        if (Cache::has($cooldownKey)) {
            $lastResendTime = Cache::get($cooldownKey);
            $cooldownRemaining = $lastResendTime->addSeconds($cooldownDuration)->diffInSeconds(now());

            return redirect()->route('verify.email.account')->with('error', 'Resend is on cooldown. Please wait ' . $cooldownRemaining . ' seconds.');
        }

        // Retrieve the user based on the provided email
        $user = User::where('email', $email)->first();

        if ($user) {
            // Generate a new verification code
            $newVerificationCode = strval(mt_rand(100000, 999999));

            // Update the user's verification code
            $user->verify_code = $newVerificationCode;
            $user->save();

            // Send the new verification code via email
            Mail::to($user->email)->send(new VerifyCodeMail($newVerificationCode, $user->first_name));

            // Update cooldown timestamp
            Cache::put($cooldownKey, now(), $cooldownDuration);

            // Redirect with success message
            return redirect()->route('verify.email.account')->with('success', 'New verification code sent successfully');
        } else {
            return redirect()->route('verify.email.account')->with('error', 'User not found.');
        }
    }
}
