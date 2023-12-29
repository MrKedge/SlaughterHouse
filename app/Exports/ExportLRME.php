<?php

namespace App\Exports;

use App\Models\Animal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;



class ExportLRME implements FromView
{
    public function view(): View
    {
        // Retrieve start_date and end_date from the session
        $startDate = session('start_date');
        $endDate = session('end_date');

        // Get distinct animal types from form_maintenances table
        $animalTypes = DB::table('form_maintenances')->distinct()->pluck('animal_type');

        // Initialize an array to store data for each date
        $animalData = [];

        // Ensure $startDate and $endDate are Carbon instances
        $startDate = $startDate ? Carbon::parse($startDate) : null;
        $endDate = $endDate ? Carbon::parse($endDate) : null;

        if ($startDate && $endDate) {
            $currentDate = $startDate->copy();

            while ($currentDate <= $endDate) {
                $currentDateFormatted = $currentDate->toDateString();

                // Retrieve animals with related postMortem for the current date
                $animalsForDate = Animal::with(['postMortem' => function ($query) use ($currentDateFormatted) {
                    $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                }])
                    ->whereHas('postMortem', function ($query) use ($currentDateFormatted) {
                        $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                    })
                    ->get();

                // Add the results to the array
                $animalData[] = [
                    'date' => $currentDateFormatted,
                    'animals' => $animalsForDate,
                ];

                // Move to the next date
                $currentDate->addDay();
            }
        }

        // Pass the dates, animalData, and animalTypes to the view
        return view('admin.reports.exports.lrme-export', compact('animalData', 'animalTypes', 'startDate', 'endDate'));
    }
}
