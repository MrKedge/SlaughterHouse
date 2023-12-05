<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Can;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;
use App\Mail\RejectMail;
use Illuminate\Support\Facades\Log;

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






    public function ApproveAnimalRegistration($id)
    {
        $animal = Animal::with('user')->where('status', 'pending')->find($id);

        if (!$animal) {
            return redirect()->route('admin.view.animal.reg.list')->with('error', 'Animal not found or already approved.');
        }

        $animal->status = 'approved';
        $animal->approved_at = now();
        $animal->save();

        $userEmail = $animal->user->email;

        if ($userEmail) {
            try {
                $mailSent = Mail::to($userEmail)->send(new ApproveMail($animal->type, $animal->status, $animal->id));

                if (!$mailSent) {
                    // Log or handle the email sending failure
                    Log::error('Email sending failed for animal ID ' . $id);
                }
            } catch (\Exception $e) {
                // Log or handle the exception (e.g., report to developers)
                Log::error('Email sending failed: ' . $e->getMessage());
            }
        } else {
            // Handle the case where user email is not available
        }

        return redirect()->route('admin.view.animal.reg.list')->with('success', 'Animal registration approved successfully.');
    }





    public function RejectAnimalRegistration(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'nullable|string|max:40',
        ]);


        $animal = Animal::with('user')->where('status', 'pending')->find($id);


        if (!$animal) {
            return redirect()->route('admin.view.animal.reg.list')->with('error', 'Animal not found or not pending.');
        }


        $animal->status = 'rejected';


        $animal->remarks = $request->input('remarks');


        $animal->save();


        $userEmail = $animal->user->email;

        if ($userEmail) {
            Mail::to($userEmail)->send(new RejectMail($animal->type, $animal->status, $animal->id, $animal->remarks));
        } else {

            //
        }


        return redirect()->route('admin.view.animal.reg.list')->with('success', 'Animal registration rejected successfully.');
    }



    public function AnteMortem()
    {

        $animal = Animal::where('status', 'inspection')->wherenull('scheduled_at')->get();


        return view('admin.admin-monitoring-list', compact('animal'));
    }




    public function MonitorAnimal($id)
    {
        $animal = Animal::where('status', 'approved')->find($id);
        $animal->status = 'inspection';
        $animal->save();
        return redirect()->back()->with('success', 'Animal has been moved to monitoring facility');
    }




    public function SetSchedule(Request $request, $id)
    {
        $request->validate([
            'dateOfSlaughter' => 'nullable',
            'timeOfSlaughter' => 'nullable',
        ]);

        $animal = Animal::where('status', 'inspection')->find($id);
        $slaughterDateTime = Carbon::parse($request->input('dateOfSlaughter') . ' ' . $request->input('timeOfSlaughter'));
        $animal->scheduled_at = $slaughterDateTime;
        $animal->ante_mortem = 'for slaughter';
        $animal->save();

        return redirect()->route('admin.monitor.list')->with('success', 'Set Schedule For Animal');
    }




    public function ForSlaughterAnimal($id)
    {


        $animal = Animal::where('ante_mortem', 'for slaughter')->find($id);


        $animal->status = 'for slaughter';
        $animal->save();

        return redirect()->route('admin.schedule.list')->with('success', 'Animal is now active for slaughtering');
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
        $animal = Animal::where('status', 'inspection')->where('ante_mortem', 'for slaughter')->wherenotnull('scheduled_at')
            ->get();

        return view('admin.admin-schedule-list', compact('animal'));
    }




    public function ShowOwnerList()
    {
        $owner = User::has('animals')->with('animals')->get();

        return view('admin.admin-owners', compact('owner'));
    }




    public function ShowSlaughteredList()
    {
        $animal = Animal::where('status', 'slaughtered')->get();

        return view('admin.admin-slaughter-list', compact('animal'));
    }
}
