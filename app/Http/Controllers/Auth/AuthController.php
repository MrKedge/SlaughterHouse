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

    public function ShowSignUp()
    {
        return view('auth.sign-up');
    }

    public function StoreAccount(Request $request)
    {
        $request->validate([
            'firstName' => 'min:3|required',
            'lastName' => 'min:3|required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('log-in');
    }

    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
    }
}
