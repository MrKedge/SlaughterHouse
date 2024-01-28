<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Schedule;
use App\Models\User;
use App\Models\AnteMortem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class AnteMortemController extends Controller
{
    public function SetArrivalTime(Request $request, $id)
    {
        $request->validate([
            'dateOfArrival' => 'nullable',
            'timeOfArrival' => 'nullable',
        ]);

        $animal = Animal::where('status', 'approved')->findOrFail($id);

        $arrivalDateTime = Carbon::parse($request->input('dateOfArrival') . ' ' . $request->input('timeOfArrival'));

        // Update or create the 'arrival_time' in the 'ante_mortem' table
        AnteMortem::updateOrCreate(
            ['animal_id' => $animal->id],
            ['arrived_at' => $arrivalDateTime]
        );

        return redirect()->route('admin.approve.list')->with('success', 'Arrival date set successfully.');
    }



    public function AnteMortemList()
    {
        $animal = Animal::where('status', 'inspection')->doesntHave('schedule')
            ->paginate(5);

        // Check user role
        if (auth()->user()->role === 'admin') {
            return view('admin.admin-monitoring-list', compact('animal'));
        } elseif (auth()->user()->role === 'inspector') {
            return view('inspector.inspector-antemortem', compact('animal'));
        }
    }








    public function MonitorAnimal($id) //check
    {
        $animal = Animal::where('status', 'approved')->find($id);
        $animal->status = 'inspection';
        $animal->save();
        return redirect()->back()->with('success', 'Animal has been moved to monitoring facility');
    }



    public function ForDisposeAnimal(Request $request, $id)
    {
        $request->validate([
            'causes' => 'nullable',
            'anteRemarks' => 'nullable',

            'examinedBy' => 'nullable',
        ]);

        // Find the animal with the anteMortem relationship loaded
        $animal = Animal::with('anteMortem')->where('status', 'inspection')->find($id);

        // Handle the case where the animal is not found
        if (!$animal) {
            return redirect()->route('admin.monitor.list')->with('error', 'Animal not found.');
        }

        // Check if the anteMortem relationship exists
        if ($animal->anteMortem) {
            // Update fields on the anteMortem relationship
            $animal->anteMortem->inspection_status = 'disposal';
            $animal->anteMortem->ante_remarks = $request->anteRemarks;
            $animal->anteMortem->causes = $request->causes;
            $animal->anteMortem->examined_by = $request->examinedBy;

            $animal->anteMortem->inspected_at = now();

            // Save the changes to the anteMortem record
            $animal->anteMortem->save();
        } else {
            return redirect()->route('admin.monitor.list')->with('error', 'AnteMortem data not found for the specified animal.');
        }

        // Update the status directly on the animal model
        $animal->status = 'not available';
        $animal->save();

        $userRole = auth()->user()->role;

        switch ($userRole) {
            case 'admin':
                return redirect()->route('admin.monitor.list')->with('success', 'Animal is disposed.');
            case 'inspector':
                return redirect()->route('inspector.antemortem.list')->with('success', 'Animal is disposed.');

            default:
                // Handle any other roles or scenarios
                break;
        }
    }




    public function SetSchedule(Request $request, $id)
    {
        $request->validate([
            'dateOfSlaughter' => 'nullable',
            'timeOfSlaughter' => 'nullable',
            'examinedBy' => 'nullable',
        ]);

        $animal = Animal::where('status', 'inspection')->find($id);

        if (!$animal) {
            return redirect()->route('admin.monitor.list')->with('error', 'Animal not found.');
        }

        $inspectAnimal = $animal->load('anteMortem');

        // Access the related AnteMortem record
        $anteMortem = $inspectAnimal->anteMortem;

        // Update the inspection status in the AnteMortem record
        $anteMortem->inspection_status = 'for slaughter';
        if ($anteMortem->inspected_at === null) {
            $anteMortem->inspected_at = now();
            $animal->anteMortem->examined_by = $request->examinedBy;
        }

        $anteMortem->save();

        // Set the schedule in the Schedule model
        $slaughterDateTime = Carbon::parse($request->input('dateOfSlaughter') . ' ' . $request->input('timeOfSlaughter'));
        Schedule::updateOrCreate(
            ['animal_id' => $animal->id],
            ['scheduled_at' => $slaughterDateTime],
        );

        // Redirect with success message
        return redirect()->back()->with('success', 'Set Schedule For Animal');
    }


    public function ShowDisposedList()
    {
        $animal = Animal::with('anteMortem')
            ->where('status', 'not available')
            ->paginate(10);

        if (auth()->user()->role === 'admin') {
            return view('admin.admin-disposal-list', compact('animal'));
        } elseif (auth()->user()->role === 'inspector') {
            return view('inspector.inspector-disposal', compact('animal'));
        }
    }



    public function ShowScheduledQueue(Request $request)
    {

        $selectedDate = $request->input('selectedDate', Carbon::now()->toDateString());

        // Convert 'month/day/year' format to 'Y-m-d' format
        $timestamp = strtotime($selectedDate);
        $formattedDate = date('Y-m-d', $timestamp);

        // Assuming 'scheduled_at' is a timestamp column
        $animal = Animal::where('status', 'for slaughter')
            ->whereHas('schedule', function ($query) use ($formattedDate) {
                $query->whereDate('scheduled_at', '=', $formattedDate);
            })->paginate(10);

        return view('admin.admin-scheduled-queue', compact('selectedDate', 'animal'));
    }
}
