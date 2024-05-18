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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function ShowAdminDashboardOverview()
    {
        $adminUser = Auth::user();
        $newAnimal = Animal::all();
        $userChart = User::All();
        $animalChart = Animal::doesntHave('archive')->get();

        $animal = Animal::with('user')->get();
        $user = User::with('animals')->get();
        $recent = Animal::whereIn('status', ['pending', 'approved',])
            ->where('created_at', '>=', Carbon::now()->subHours(8))
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard-data.admin-dashboard', compact('recent', 'animal', 'user', 'animalChart', 'userChart', 'adminUser'));
    }





    public function ShowForSlaughterList(Request $request)
    {
        $sortColumn = $request->input('sort_column', 'animals.id');
        $sortOrder = $request->input('sort_order', 'asc');

        // Adjust the sorting column if necessary
        if ($sortColumn === 'date') {
            $sortColumn = 'animals.created_at';
        } elseif ($sortColumn === 'user_name') {
            // Sorting by user name requires joining the users table
            $sortColumn = 'users.name';
        }

        // Fetch animals with the specified status
        $animal = Animal::where('status', 'for slaughter')
            ->leftJoin('users', 'animals.user_id', '=', 'users.id')
            ->leftJoin('schedules', 'animals.id', '=', 'schedules.animal_id')
            ->orderBy($sortColumn, $sortOrder) // Apply sorting
            ->select('animals.*', 'users.first_name as first_name') // Select necessary columns
            ->paginate(5);

        return view('admin.admin-for-slaughter-list', [
            'animal' => $animal,
            'sortColumn' => $request->input('sort_column', 'animals.id'), // Keep original sort column for UI
            'sortOrder' => $sortOrder,
            'request' => $request,
        ]);
    }



    public function showApproveList(Request $request)
    {
        $sortColumn = $request->input('sort_column', 'id');
        $sortOrder = $request->input('sort_order', 'asc');

        // Handle specific sort columns from related tables
        if ($sortColumn === 'date') {
            $sortColumn = 'animals.created_at';
        }

        $animal = Animal::with(['user', 'anteMortem'])
            ->leftJoin('users', 'animals.user_id', '=', 'users.id')
            ->where('animals.status', 'approved')
            ->orderBy($sortColumn, $sortOrder)
            ->select('animals.*')
            ->paginate(5);

        // Pass data to the view
        return view('admin.admin-approve-list', [
            'animal' => $animal,
            'sortColumn' => $request->input('sort_column', 'id'),
            'sortOrder' => $sortOrder,
            'request' => $request,
        ]);
    }


    public function ShowRegistrationList(Request $request)      //for showing the animals list on the table//-------------------------------
    {
        $sortColumn = $request->input('sort_column', 'id');
        $sortOrder = $request->input('sort_order', 'asc');

        if ($sortColumn === 'date') {
            $sortColumn = 'created_at';
        }


        $animal = DB::table('animals')
            ->select('animals.*', 'users.first_name', 'users.last_name', 'users.email')
            ->join('users', 'users.id', '=', 'animals.user_id')
            ->where('status', 'pending')
            ->orderBy($sortColumn, $sortOrder)
            ->paginate(5);



        return view('admin.admin-animal-reg-list', compact('animal', 'sortColumn', 'sortOrder', 'request'));
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







    public function ShowScheduleList(Request $request)
    {
        $sortColumn = $request->input('sort_column', 'animals.id');
        $sortOrder = $request->input('sort_order', 'asc');

        // Adjust the sorting column if necessary
        if ($sortColumn === 'date') {
            $sortColumn = 'animals.created_at';
        } elseif ($sortColumn === 'arrived_at') {
            $sortColumn = 'ante_mortems.arrived_at'; // Assuming 'arrived_at' is a column in 'ante_mortems'
        }

        // Fetch animals with the specified conditions
        $animal = Animal::where('animals.status', 'inspection')
            ->whereHas('schedule', function ($query) {
                $query->whereNotNull('scheduled_at');
            })
            ->whereHas('anteMortem', function ($query) {
                $query->where('inspection_status', 'for slaughter');
            })
            ->leftJoin('users', 'animals.user_id', '=', 'users.id') // Join with users table
            ->leftJoin('ante_mortems', 'animals.id', '=', 'ante_mortems.animal_id') // Join with ante_mortems table
            ->leftJoin('schedules', 'animals.id', '=', 'schedules.animal_id')
            ->orderBy($sortColumn, $sortOrder) // Apply sorting
            ->select('animals.*', 'users.first_name as first_name', 'ante_mortems.arrived_at as arrived_at') // Select necessary columns
            ->paginate(5);

        return view('admin.admin-schedule-list', [
            'animal' => $animal,
            'sortColumn' => $request->input('sort_column', 'animals.id'), // Keep original sort column for UI
            'sortOrder' => $sortOrder,
            'request' => $request,
        ]);
    }



    public function ShowSlaughteredList(Request $request)
    {
        $sortColumn = $request->input('sort_column', 'animals.id');
        $sortOrder = $request->input('sort_order', 'asc');

        // Adjust the sorting column if necessary
        if ($sortColumn === 'date') {
            $sortColumn = 'animals.created_at';
        } elseif ($sortColumn === 'arrived_at') {
            // If sorting by 'arrived_at', assume it's from the 'ante_mortems' table
            $sortColumn = 'ante_mortems.arrived_at';
        }

        // Fetch animals with the specified status and incomplete post-mortem status
        $animal = Animal::where('status', 'slaughtered')
            ->whereHas('postMortem', function ($query) {
                $query->whereNull('postmortem_status');
            })
            ->leftJoin('ante_mortems', 'animals.id', '=', 'ante_mortems.animal_id') // Join with ante_mortems table for sorting
            ->leftJoin('post_mortems', 'animals.id', '=', 'post_mortems.animal_id')
            ->leftJoin('users', 'animals.user_id', '=', 'users.id') // Join with users table to select 'users.first_name'
            ->orderBy($sortColumn, $sortOrder) // Apply sorting
            ->select('animals.*', 'users.first_name as first_name')
            ->paginate(5);

        return view('admin.admin-slaughter-list', [
            'animal' => $animal,
            'sortColumn' => $request->input('sort_column', 'animals.id'), // Keep original sort column for UI
            'sortOrder' => $sortOrder,
            'request' => $request,
        ]);
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
