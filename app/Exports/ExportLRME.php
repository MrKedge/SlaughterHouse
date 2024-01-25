<?php

namespace App\Exports;


use App\Models\Animal;
use App\Models\FormMaintenance;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportLRME implements FromView, WithStyles
{
    use Exportable;
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }


    public function view(): View
    {

        $allFormData = FormMaintenance::all();


        $animalTypes = $allFormData->pluck('animal_type')->unique();

        $animalData = [];


        $startDate = $this->getStartDate();
        $endDate = $this->getEndDate();


        if ($startDate && $endDate) {
            $currentDate = $startDate->copy();
            while ($currentDate <= $endDate) {
                $currentDateFormatted = $currentDate->toDateString();


                $animalsForDate = $this->getAnimalsForDate($currentDateFormatted);


                $animalData[] = [
                    'date' => $currentDateFormatted,
                    'animals' => $animalsForDate,
                ];


                $currentDate->addDay();
            }
        }


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




    public function styles(Worksheet $sheet)
    {
        // Apply styles to the header row (A1:F1)
        $headerRow = $sheet->getStyle('A1:E1');
        $headerRow->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'wrapText' => true,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Set margin (column width) for each data column
        // $columnWidths = [
        //     'A' => 5,  // Adjust the width for column A
        //     'B' => 5,  // Adjust the width for column B
        //     'C' => 5,  // Adjust the width for column C
        //     'D' => 5,  // Adjust the width for column D
        //     'E' => 5,  // Adjust the width for column E

        // ];

        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL);

        // Set the orientation to landscape
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

        // Calculate and set equal width for all columns
        $totalWidth = 25; // Adjust total width based on your requirements
        $columnCount = count(range('A', 'E')); // Assuming columns A to E
        $equalWidth = $totalWidth / $columnCount;

        $columnWidths = array_fill_keys(range('A', 'E'), $equalWidth);

        // Set column widths
        foreach ($columnWidths as $column => $width) {
            $sheet->getColumnDimension($column)->setWidth($width);
        }
        // $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Center-align all the cells in the worksheet
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}
