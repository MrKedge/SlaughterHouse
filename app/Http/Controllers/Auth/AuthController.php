<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
