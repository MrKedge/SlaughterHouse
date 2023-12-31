<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExportLRME;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade
use App\Models\Animal;
use App\Models\FormMaintenance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{
    private $startDate;
    private $endDate;

    public function ShowReportLRME(Request $request)
    {
        // Get all data from FormMaintenance model
        $allFormData = FormMaintenance::all();

        // Get distinct animal types from all data
        $animalTypes = $allFormData->pluck('animal_type')->unique();

        // Retrieve user input for start and end dates
        $startDate = $request->input('start_date', Carbon::now()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());

        // Store start_date and end_date in the session
        $request->session()->put('start_date', $startDate);
        $request->session()->put('end_date', $endDate);

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
        return view('admin.reports.lrme', compact('animalData', 'animalTypes', 'startDate', 'endDate', 'allFormData'));
    }

    public function DownloadLRME(Request $request)
    {
        // Retrieve start_date and end_date from the session
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        // Download Excel using ExportLRME
        return Excel::download(new ExportLRME($startDate, $endDate), 'lrme-export.xlsx');
    }


    public function ShowSSHPDP()
    {
        $animalType =  FormMaintenance::pluck('animal_type')->toArray();

        return view('admin.reports.sshpdp', compact('animalType'));
    }


    public function ShowAnimalSSHPDP(Request $request, $animalType)
    {
        $allFormData = FormMaintenance::all();

        $startDate = $request->input('start_date', Carbon::now()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());



        $currentDate = Carbon::parse($startDate);
        $animalData = [];

        while ($currentDate <= Carbon::parse($endDate)) {
            $currentDateFormatted = $currentDate->toDateString();

            // Retrieve animals with related postMortem or anteMortem for the current date
            $animalsForDate = Animal::with([
                'postMortem' => function ($query) use ($currentDateFormatted) {
                    $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                },
                'anteMortem' => function ($query) use ($currentDateFormatted) {
                    $query->whereDate('inspected_at', $currentDateFormatted)->where('inspection_status', 'disposal');
                },
            ])
                ->where(function ($query) use ($currentDateFormatted) {
                    // Include animals with postMortem or anteMortem for the current date
                    $query->whereHas('postMortem', function ($subQuery) use ($currentDateFormatted) {
                        $subQuery->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                    })
                        ->orWhereHas('anteMortem', function ($subQuery) use ($currentDateFormatted) {
                            $subQuery->whereDate('inspected_at', $currentDateFormatted)->where('inspection_status', 'disposal');
                        });
                })
                ->where('type', $animalType)
                ->get();

            // Extract the source data for the first animal of the current date
            $sourceData = null;
            if ($animalsForDate->isNotEmpty()) {
                $sourceData = $allFormData->where('animal_source', $animalsForDate->first()->source)->first();
            }

            // Add the results to the array
            $animalData[] = [
                'date' => $currentDateFormatted,
                'animals' => $animalsForDate,
                'sourceData' => $sourceData,
            ];

            // Move to the next date
            $currentDate->addDay();
        }

        return view('admin.reports.per-animal-sshpdp', compact('animalData', 'startDate', 'endDate', 'animalType', 'allFormData'));
    }
}
