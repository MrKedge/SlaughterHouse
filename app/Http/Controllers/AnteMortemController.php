<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Schedule;
use App\Models\User;
use App\Models\AnteMortem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        return redirect()->route('admin.approve.list')->with('success', 'Animal scheduled successfully.');
    }




    public function AnteMortemList()
    {

        $animal = Animal::where('status', 'inspection')->doesntHave('schedule')
            ->get();


        return view('admin.admin-monitoring-list', compact('animal'));
    }








    public function MonitorAnimal($id) //check
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

        if (!$animal) {
            return redirect()->route('admin.monitor.list')->with('error', 'Animal not found.');
        }

        $inspectAnimal = $animal->load('anteMortem');

        // Access the related AnteMortem record
        $anteMortem = $inspectAnimal->anteMortem;

        // Update the inspection status in the AnteMortem record
        $anteMortem->inspection_status = 'for slaughter';
        $anteMortem->save();

        // Set the schedule in the Schedule model
        $slaughterDateTime = Carbon::parse($request->input('dateOfSlaughter') . ' ' . $request->input('timeOfSlaughter'));
        Schedule::updateOrCreate(
            ['animal_id' => $animal->id],
            ['scheduled_at' => $slaughterDateTime]
        );

        // Redirect with success message
        return redirect()->route('admin.monitor.list')->with('success', 'Set Schedule For Animal');
    }
}
