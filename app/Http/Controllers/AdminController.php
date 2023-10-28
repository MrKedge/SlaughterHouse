<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowAdminDashboardOverview()
    {
        return view('admin.admin-dashboard');
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


    public function ShowRegistrationForm($id) //for viewing the form with specific client along with their animal//
    {

        $animal = Animal::with('user_id')->get($id);
        return view('admin.admin-view-form', compact('animal'));
    }

    public function ApproveAnimalRegistration($id) //for approving the animal registration form//
    {
        // Find the animal by ID
        $animal = Animal::find($id);

        // Check if the animal exists
        if (!$animal) {
            return redirect()->back()->with('error', 'Animal not found');
        }

        // Update the status of the animal
        $animal->update(['status' => 'approved']);

        // Redirect back with a success message
        return redirect()->route('admin.view.animal.reg.form');
    }
}
