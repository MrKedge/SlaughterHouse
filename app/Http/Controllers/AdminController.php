<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Can;

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





    public function ShowForSlaughterList()
    {
        $animal = Animal::where('status', 'for slaughter')->get();
        return view('admin.admin-for-slaughter-list', compact('animal'));
    }





    public function ShowApproveList()
    {
        $animal = Animal::with('user')
            ->where('status', 'approved')
            ->get();
        return view('admin.admin-approve-list', compact('animal'));
    }





    public function ShowRegistrationList()      //for showing the animals list on the table//-------------------------------
    {
        //$users = User::with('animals')->get();
        $animals = Animal::with('user')
            ->where('status', 'pending')
            ->get();
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
        $animal->approved_at = now();
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



    public function AnteMortem()
    {

        $animal = Animal::where('status', 'inspection')->get();


        return view('admin.admin-monitoring-list', compact('animal'));
    }




    public function MonitorAnimal($id)
    {
        $animal = Animal::where('status', 'approved')->find($id);
        $animal->status = 'inspection';
        $animal->save();
        return redirect()->back()->with('success', 'Animal has been moved to monitoring facility');
    }



    public function ForSlaughterAnimal(Request $request, $id)
    {
        $request->validate([
            'dateOfSlaughter' => 'nullable',
            'timeOfSlaughter' => 'nullable',
        ]);

        $animal = Animal::where('status', 'inspection')->find($id);

        $slaughterDateTime = Carbon::parse($request->input('dateOfSlaughter') . ' ' . $request->input('timeOfSlaughter'));
        $animal->status = 'for slaughter';
        $animal->scheduled_at = $slaughterDateTime;
        $animal->save();

        return redirect()->route('admin.monitor.list')->with('success', 'Animal pass the ante mortem');
    }




    public function ForDisposeAnimal($id)
    {
        $animal = Animal::where('status', 'inspection')->find($id);
        $animal->status = 'Disposal';
        $animal->save();

        return redirect()->route('admin.monitor.list')->with('disposed', 'Animal pass the ante mortem');
    }




    public function SetArrivalTime(Request $request, $id)
    {
        // $arrivalDate = $request->input('dateOfArrival');
        // $arrivalTime = $request->input('timeOfArrival');

        // $slaughterDate = $request->input('dateOfSlaughter');
        // $slaughterTime = $request->input('timeOfSlaughter');

        // $arrivalDateTime = Carbon::parse("$arrivalDate $arrivalTime");
        // $slaughterDateTime = Carbon::parse("$slaughterDate $slaughterTime");


        $request->validate([
            'dateOfArrival' => 'nullable',
            'timeOfArrival' => 'nullable',

        ]);

        $animal = Animal::where('status', 'approved')->findorfail($id);


        $arrivalDateTime = Carbon::parse($request->input('dateOfArrival') . ' ' . $request->input('timeOfArrival'));



        $animal->arrived_at = $arrivalDateTime;



        $animal->save();

        return redirect()->route('admin.approve.list')->with('success', 'Animal scheduled successfully.');
    }





    public function ShowScheduleList()
    {
        $animal = Animal::where('status', 'for slaughter')->wherenotnull('scheduled_at')
            ->get();

        return view('admin.admin-schedule-list', compact('animal'));
    }





    public function ShowSlaughteredList()
    {
        $animal = Animal::where('status', 'slaughtered')->get();

        return view('admin.admin-slaughter-list', compact('animal'));
    }
}
