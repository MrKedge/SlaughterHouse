<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExportLRME; // Import the InvoicesExport class
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade
use App\Models\Animal;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function ShowReportLRME()
    {
        // Get distinct animal types from form_maintenances table
        $animalTypes = DB::table('form_maintenances')->distinct()->pluck('animal_type');

        // Define the date range (starting and ending dates)
        $startDate = '2023-12-24';
        $endDate = '2023-12-30';

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

        // Return the view with the retrieved data
        return view('admin.reports.lrme', compact('animalData', 'animalTypes', 'startDate', 'endDate'));
    }






    public function DownloadLRME()
    {
        return Excel::download(new ExportLRME, 'lrme.xlsx');
    }
}
