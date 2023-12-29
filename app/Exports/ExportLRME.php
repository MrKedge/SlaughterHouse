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
    private $startDate;
    private $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        // Get distinct animal types from form_maintenances table
        $animalTypes = DB::table('form_maintenances')->distinct()->pluck('animal_type');

        // Initialize an array to store data for each date
        $animalData = [];

        // Loop through each date in the range
        $currentDate = Carbon::parse($this->startDate);
        while ($currentDate <= Carbon::parse($this->endDate)) {
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

        return view('admin.reports.exports.lrme-export', compact('animalData', 'animalTypes', 'currentDateFormatted'));
    }
}
