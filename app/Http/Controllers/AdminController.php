<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowAdminDashboardOverview()
    {
        return view('admin.admin-dashboard');
    }

    public function ShowReceiveRegistrationForm()
    {
        return view('admin.admin-view-form');
    }

    public function ShowRegistrationList()
    {
        $users = User::with('animals')->get();
        return view('admin.admin-animal-reg-list', compact('users'));
    }

    public function ShowEditRegistration()
    {
        return view('admin.admin-edit-registration');
    }
}
