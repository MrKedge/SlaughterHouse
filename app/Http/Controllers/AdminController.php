<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\AnteMortem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Can;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;
use App\Mail\RejectMail;
use Illuminate\Support\Facades\Log;
use App\Models\FormMaintenance;

class AdminController extends Controller
{
    public function ShowAdminDashboardOverview()
    {
        $userChart = User::All();
        $animalChart = Animal::doesntHave('archive')->get();

        $animal = Animal::with('user')->get();
        $user = User::with('animals')->get();
        $recent = Animal::whereIn('status', ['pending', 'approved',])
            ->where('created_at', '>=', Carbon::now()->subHours(8))
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard-data.admin-dashboard', compact('recent', 'animal', 'user', 'animalChart', 'userChart'));
    }





    public function ShowForSlaughterList()
    {
        $animal = Animal::where('status', 'for slaughter')->get();
        return view('admin.admin-for-slaughter-list', compact('animal'));
    }




    public function ShowApproveList()
    {
        $animal = Animal::with(['user', 'anteMortem'])
            ->where('status', 'approved')
            ->paginate(5);

        return view('admin.admin-approve-list', compact('animal'));
    }


    public function ShowRegistrationList()      //for showing the animals list on the table//-------------------------------
    {
        $animal = Animal::with('user')
            ->where('status', 'pending')
            ->paginate(5);
        return view('admin.admin-animal-reg-list', compact('animal'));
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






    public function ForSlaughterAnimal($id)
    {
        $animal = Animal::wherehas('anteMortem', function ($query) {
            $query->where('inspection_status', 'for slaughter');
        })
            ->find($id);

        if (!$animal) {
            return redirect()->route('admin.schedule.list')->with('error', 'Animal not found or not eligible for slaughter.');
        }

        $animal->status = 'for slaughter';
        $animal->save();

        return redirect()->route('admin.schedule.list')->with('success', 'Animal is now active for slaughtering');
    }







    public function ShowScheduleList()
    {
        $animal = Animal::where('status', 'inspection')
            ->whereHas('schedule', function ($query) {
                $query->whereNotNull('scheduled_at');
            })
            ->whereHas('anteMortem', function ($query) {
                $query->where('inspection_status', 'for slaughter');
            })
            ->paginate(5);

        return view('admin.admin-schedule-list', compact('animal'));
    }



    public function ShowSlaughteredList()
    {
        $animal = Animal::where('status', 'slaughtered')
            ->whereHas('postMortem', function ($query) {
                $query->whereNull('postmortem_status');
            })
            ->get();

        return view('admin.admin-slaughter-list', compact('animal'));
    }




    public function ShowCreateAccount()
    {
        return view('admin.admin-create-account');
    }


    public function ShowAdminRegister()
    {
        $animal = FormMaintenance::all();
        return view('admin.admin-register-animal', compact('animal'));
    }
}
