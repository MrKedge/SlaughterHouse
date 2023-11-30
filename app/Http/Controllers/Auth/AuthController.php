<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view('auth.log-in');
    }

    public function LogOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateTOken();
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

        $user->save();
        return redirect()->route('log.in');
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

            // Check the user's role
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Redirect admin to admin dashboard
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'client') {
                // Redirect client to client overview
                return redirect()->route('client.overview');
            } elseif ($user->role === 'butcher') {
                return redirect()->route('butcher.overview');
            }
        }
        return redirect()->route('log.in')->with('error', 'Invalid email or password');
    }
}
