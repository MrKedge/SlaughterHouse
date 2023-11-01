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



    public function ShowRegistrationList()      //for showing the animals list on the table//-------------------------------
    {
        $users = User::with('animals')->get();
        return view('admin.admin-animal-reg-list', compact('users'));
    }

    public function ShowEditRegistration()
    {
        return view('admin.admin-edit-registration');
    }


    public function ShowRegistrationForm($id)       //for viewing the animal form in reg table//----------------------------
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('admin.admin-view-form', compact('animal', 'user'));
    }


    public function ApproveAnimalRegistration($id)      //for approving the animal registration form//----------------------
    {

        $animal = Animal::find($id)->where('status', 'pending')->first();


        // Update the status to 'approved' or perform any other necessary actions
        $animal->status = 'approved';
        $animal->save();
        return redirect()->route('admin.view.animal.reg.form', ['id' => $id]);
    }

    public function RejectAnimalRegistration($id)
    {
        $animal = Animal::find($id)->where('status', 'pending')->first();
        $animal->status = 'rejected';
        $animal->save();
        return redirect()->route('admin.view.animal.reg.list', ['id' => $id]);
    }
}
