<?php

namespace App\Exports;

use App\Models\Animal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\FormMaintenance;


class ExportLRME implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }


    public function view(): View
    {
        // Retrieve all form data
        $allFormData = FormMaintenance::all();

        // Get distinct animal types from form_maintenances table
        $animalTypes = $allFormData->pluck('animal_type')->unique();

        // Initialize an array to store data for each date
        $animalData = [];

        // Ensure $this->startDate and $this->endDate are Carbon instances
        $startDate = $this->getStartDate();
        $endDate = $this->getEndDate();

        // Iterate through the date range
        if ($startDate && $endDate) {
            $currentDate = $startDate->copy(); // Use copy to avoid modifying the original date

            while ($currentDate <= $endDate) {
                $currentDateFormatted = $currentDate->toDateString();

                // Retrieve animals with related postMortem for the current date
                $animalsForDate = $this->getAnimalsForDate($currentDateFormatted);

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
        return view('admin.reports.exports.lrme-export', compact('animalData', 'animalTypes', 'startDate', 'endDate', 'allFormData'));
    }

    /**
     * Get the start date for the report.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    private function getStartDate()
    {
        return $this->startDate instanceof Carbon ? $this->startDate : Carbon::parse($this->startDate);
    }

    /**
     * Get the end date for the report.
     *
     * @return \Illuminate\Support\Carbon|null
     */
    private function getEndDate()
    {
        return $this->endDate instanceof Carbon ? $this->endDate : Carbon::parse($this->endDate);
    }

    /**
     * Get animals with related post-mortem data for the specified date.
     *
     * @param string $dateFormatted
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getAnimalsForDate(string $dateFormatted)
    {
        return Animal::with(['postMortem' => function ($query) use ($dateFormatted) {
            $query->whereDate('slaughtered_at', $dateFormatted)->where('postmortem_status', 'good');
        }])
            ->whereHas('postMortem', function ($query) use ($dateFormatted) {
                $query->whereDate('slaughtered_at', $dateFormatted)->where('postmortem_status', 'good');
            })
            ->get();
    }
}
