<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExportLRME;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade
use App\Models\Animal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{
    public function ShowReportLRME()
    {
        // Get distinct animal types from form_maintenances table
        $animalTypes = DB::table('form_maintenances')->distinct()->pluck('animal_type');

        // Retrieve user input for start and end dates
        $startDate = request('start_date', Carbon::now()->toDateString());
        $endDate = request('end_date', Carbon::now()->toDateString());

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

        // Store start_date and end_date in the session
        session(['start_date' => $startDate, 'end_date' => $endDate]);

        // Return the view with the retrieved data
        return view('admin.reports.lrme', compact('animalData', 'animalTypes', 'startDate', 'endDate'));
    }

    public function DownloadLRME(Request $request)
    {
        // Retrieve start_date and end_date from the session
        $startDate = session('start_date');
        $endDate = session('end_date');

        // Download Excel using ExportLRME
        return Excel::download(new ExportLRME(), 'lrme-export.xlsx');
    }
}
