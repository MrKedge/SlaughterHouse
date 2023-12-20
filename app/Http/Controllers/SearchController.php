<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $users = User::with('animals')->get();

        return view('users.index', ['users' => $users]);
    }
}
