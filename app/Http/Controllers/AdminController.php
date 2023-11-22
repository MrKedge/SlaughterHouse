<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function ShowAdminDashboardOverview()
    {
        $animal = Animal::with('user')->get();
        $user = User::with('animals')->get();
        $recent = Animal::whereIn('status', ['pending', 'approved',])
            ->where('created_at', '>=', Carbon::now()->subHours(8))
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('admin.admin-dashboard', compact('recent', 'animal', 'user'));
    }



    public function ShowRegistrationList()      //for showing the animals list on the table//-------------------------------
    {
        //$users = User::with('animals')->get();
        $animals = Animal::with('user')->where('status', '!=', 'archived')->get();
        return view('admin.admin-animal-reg-list', compact('animals'));
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

        $animal = Animal::where('status', 'pending')->find($id);


        // Update the status to 'approved' or perform any other necessary actions
        $animal->status = 'approved';
        $animal->save();
        return redirect()->route('admin.view.animal.reg.list', ['id' => $id]);
    }

    public function RejectAnimalRegistration(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'nullable|string|max:40', // Adjust validation rules as needed
        ]);

        $animal = Animal::where('status', 'pending')->find($id);

        if (!$animal) {
            // Handle the case where the animal with the given ID and 'pending' status is not found
            return redirect()->route('admin.view.animal.reg.list')->with('error', 'Animal not found or not pending.');
        }

        // Update the status
        $animal->status = 'rejected';

        // Add remarks if provided
        $animal->remarks = $request->input('remarks');

        $animal->save();

        return redirect()->route('admin.view.animal.reg.list')->with('success', 'Animal registration rejected successfully.');
    }
}
