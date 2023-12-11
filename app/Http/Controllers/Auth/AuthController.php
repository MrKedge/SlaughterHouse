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
        // Get the user's email before logging out
        $email = Auth::user()->email;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session(['email' => $email]);
        return redirect('log-in')->with('status', 'Logout Successful');
    }

    public function ShowSignUp()
    {
        //session()->flush();
        return view('auth.sign-up');
    }

    public function storeAccount(Request $request)
    {
        // Check if the email is already present in the database
        if (User::where('email', $request->email)->exists()) {
            session()->forget('newEmail');  // Forget the 'email' session
            return redirect()->route('sign.up')
                ->withErrors(['email' => 'This email is already registered'])
                ->withInput($request->except('password'));
        }
        if ($request->password !== $request->password_confirmation) {
            session(['newEmail' => $request->email]);
            return redirect()->route('sign.up')
                ->withErrors(['password' => 'Password confirmation does not match'])
                ->withInput($request->except('password'));
        }


        // Validate the incoming request
        $request->validate([
            'firstName' => 'min:3|required',
            'lastName' => 'min:3|required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'firstName.min' => 'First name must be at least :min characters.',
            'lastName.min' => 'Last name must be at least :min characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'The provided Email is already registered.',
            'password.required' => 'Password is required.',
        ]);

        // If password does not match, store the email in the session




        // If email is not present, proceed to create a new user
        $user = new User();

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->role = 'client';
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

        // Save the user instance
        $user->save();

        // Additional logic or redirection after successful user creation
        try {
            $verificationCode = strval(mt_rand(100000, 999999));

            $user->verify_code = $verificationCode;

            $user->save();
            session(['email' => $user->email]);
            session(['lastName' => $user->first_name]);

            Mail::to($user->email)->send(new VerifyCodeMail($verificationCode, $user->first_name));

            return redirect()->route('verify.email.account');
        } catch (\Exception $e) {
            // Handle the exception gracefully
            // For example, log the error, notify the user, or redirect with an error message
            return redirect()->route('verify.email.account')->withErrors(['error' => 'Failed to send verification email. Please try again later.']);
        }
    }

    //login try
    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If the login attempt fails, check if the email exists in the database
        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'client') {
                return redirect()->route('client.overview');
            } elseif ($user->role === 'butcher') {
                return redirect()->route('butcher.overview');
            } elseif ($user->role === 'inspector') {
                return redirect()->route('inspector.overview');
            }
        } elseif ($user) {
            // Email is correct, but password is wrong
            return redirect()->route('log.in')
                ->withErrors(['error' => 'Invalid password'])
                ->withInput($request->except('password'));
        }

        $request->session()->forget('email'); // Clear the email from the session
        return redirect()->route('log.in')
            ->withErrors(['error' => 'Email does not exist in the database']);
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


    //for admin creating accounts
    public function createAccount(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            session()->forget('newEmail');  // Forget the 'email' session
            return redirect()->route('admin.create.account')
                ->withErrors(['email' => 'This email is already registered'])
                ->withInput($request->except('password'));
        }


        if ($request->password !== $request->password_confirmation) {
            session(['newEmail' => $request->email]);
            return redirect()->route('admin.create.account')
                ->withErrors(['password' => 'Password confirmation does not match'])
                ->withInput($request->except('password'));
        }


        $request->validate([
            'firstName' => 'min:3|required',
            'lastName' => 'min:3|required',
            'role' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'firstName.min' => 'First name must be at least :min characters.',
            'lastName.min' => 'Last name must be at least :min characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'The provided Email is already registered.',
            'password.required' => 'Password is required.',
        ]);


        $user = new User();

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();

        $user->save();


        return redirect()->route('admin.create.account')->with('success', 'Account created successfully!');
    }
}
