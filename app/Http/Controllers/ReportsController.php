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

        $allFormData = FormMaintenance::all();


        $animalTypes = $allFormData->pluck('animal_type')->unique();


        $startDate = $request->input('start_date', Carbon::now()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());


        $request->session()->put('start_date', $startDate);
        $request->session()->put('end_date', $endDate);


        $animalData = [];


        $currentDate = Carbon::parse($startDate);
        while ($currentDate <= Carbon::parse($endDate)) {
            $currentDateFormatted = $currentDate->toDateString();


            $animalsForDate = Animal::with(['postMortem' => function ($query) use ($currentDateFormatted) {
                $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
            }])
                ->whereHas('postMortem', function ($query) use ($currentDateFormatted) {
                    $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                })
                ->get();


            $animalData[] = [
                'date' => $currentDateFormatted,
                'animals' => $animalsForDate,
            ];


            $currentDate->addDay();
        }

        return view('admin.reports.lrme', compact('animalData', 'animalTypes', 'startDate', 'endDate', 'allFormData'));
    }

    public function DownloadLRME(Request $request)
    {

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');


        // return Excel::download(new ExportLRME($startDate, $endDate), 'lrme-export.xlsx');

        return Excel::download(new ExportLRME($startDate, $endDate), 'lrme-export.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
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


            $animalsForDate = Animal::with([
                'postMortem' => function ($query) use ($currentDateFormatted) {
                    $query->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                },
                'anteMortem' => function ($query) use ($currentDateFormatted) {
                    $query->whereDate('inspected_at', $currentDateFormatted)->where('inspection_status', 'disposal');
                },
            ])
                ->where(function ($query) use ($currentDateFormatted) {

                    $query->whereHas('postMortem', function ($subQuery) use ($currentDateFormatted) {
                        $subQuery->whereDate('slaughtered_at', $currentDateFormatted)->where('postmortem_status', 'good');
                    })
                        ->orWhereHas('anteMortem', function ($subQuery) use ($currentDateFormatted) {
                            $subQuery->whereDate('inspected_at', $currentDateFormatted)->where('inspection_status', 'disposal');
                        });
                })
                ->where('type', $animalType)
                ->get();


            $sourceData = null;
            if ($animalsForDate->isNotEmpty()) {
                $sourceData = $allFormData->where('animal_source', $animalsForDate->first()->source)->first();
            }


            $animalData[] = [
                'date' => $currentDateFormatted,
                'animals' => $animalsForDate,
                'sourceData' => $sourceData,
            ];


            $currentDate->addDay();
        }

        return view('admin.reports.per-animal-sshpdp', compact('animalData', 'startDate', 'endDate', 'animalType', 'allFormData'));
    }
}
