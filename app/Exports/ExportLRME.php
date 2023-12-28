<?php

namespace App\Exports;

use App\Models\Animal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ExportLRME implements FromView
{
    public function view(): View
    {
        $animalTypes = DB::table('form_maintenances')->distinct()->pluck('animal_type');

        // Define the date range (starting and ending dates)
        $startDate = '2023-12-24';
        $endDate = '2023-12-28';

        // Initialize an array to store data for each date
        $animalData = [];

        // Loop through each date in the range
        $currentDate = Carbon::parse($startDate);
        while ($currentDate <= Carbon::parse($endDate)) {
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

        return view('admin.reports.exports.lrme-export', compact('animalData', 'animalTypes', 'startDate', 'endDate'));
    }
}
