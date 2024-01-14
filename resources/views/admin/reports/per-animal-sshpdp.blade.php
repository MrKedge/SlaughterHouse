<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Animal SSHPDP'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}

        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}



            <div class="flex flex-col w-full ml-[240px]">


                <div class="mx-auto w-full px-4 h-full">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    {{-- <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg  border border-white p-4">
    
                        <div class="flex justify-between ">
    
                            <div class="text-gray-600"> @include('admin.tabs.tabs')</div>
                            @include('admin.tabs.search-bar')
    
                        </div>
    
                    </section> --}}

                    <div class="flex text-start mt-16 items-center gap-4">
                        <h1 class=" text-gray-600 font-medium text-2xl rounded-lg px-5 ">
                            SSHPDP</h1>

                        <a href="{{ route('download.lrme') }}"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>

                        </a>

                    </div>

                </div>
            </div>

        </div>



        <div class="px-4 pt-4 ">
            <div class=" shadow-md sm:rounded-lg flex justify-center ml-[240px]">


                <div
                    class="overflow-x-auto overflow-y-auto w-full h-[600px]  sm:rounded-lg rounded-b-xl border border-white">

                    <table class=" text-sm text-left h-full text-gray-500">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">

                            <form action="{{ route('animal.sshpdp', ['animalType' => $animalType]) }}" method="get">
                                @csrf
                                <div class="flex items-center gap-3">
                                    <label for="start_date">Date:</label>
                                    <div>
                                        <input id="start_date" name="start_date" required type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            value="{{ $startDate }}">
                                    </div>
                                    <label for="end_date">to</label>
                                    <div>
                                        <input id="end_date" name="end_date" required type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            value="{{ $endDate }}">
                                    </div>
                                    <button type="submit"
                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-600 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                    </button>

                                    <select id=""
                                        class="ml-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">

                                        <option selected>Source</option>

                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($allFormData as $formMaintenance)
                                            @if ($formMaintenance->animal_source !== null && $formMaintenance->animal_source !== '')
                                                <option value="{{ $formMaintenance->animal_source }}" disabled>
                                                    {{ $counter }} - {{ $formMaintenance->animal_source }}
                                                </option>
                                                @php
                                                    $counter++;
                                                @endphp
                                            @endif
                                        @endforeach

                                    </select>
                                    <select id=""
                                        class="ml-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">

                                        <option selected>Destination</option>

                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($allFormData as $formMaintenance)
                                            @if ($formMaintenance->animal_destination !== null && $formMaintenance->animal_destination !== '')
                                                <option value="{{ $formMaintenance->animal_destination }}" disabled>
                                                    {{ $counter }} - {{ $formMaintenance->animal_destination }}
                                                </option>
                                                @php
                                                    $counter++;
                                                @endphp
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </form>
                            {{-- <p class="mt-1 text-sm font-normal text-gray-500">This is the registered Animal for the
                                month of December.</p> --}}
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th colspan="19" class="px-6 py-4 border text-center whitespace-nowrap">
                                    DAILY ANIMAL INSPECTION AND SLAUGHTER REPORT
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Date
                                </th>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Sex of Species
                                </th>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    No. of Head Received
                                </th>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Origin (refer to code)
                                </th>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Average Live weight per head (in kg)
                                </th>
                                <th colspan="4" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Ante-Mortem Inspection
                                </th>
                                <th rowspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Average Carcass Weight per head (in kg)
                                </th>
                                <th colspan="5" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Post-Mortem Inspection
                                </th>
                                <th colspan="4" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Destination of Meat
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Condemnation
                                </th>
                                <th rowspan="2" class="px-6 py-4 border text-center whitespace-nowrap">
                                    No. Head Fit For Slaughter
                                </th>
                                <th colspan="2" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Carcass/es Condemned
                                </th>
                                <th colspan="3" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Organ/s Condemned
                                </th>
                                <th colspan="2" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Outside the Province
                                </th>
                                <th colspan="2" class="px-6 py-4 border text-center whitespace-nowrap">
                                    Within the Province
                                </th>
                            </tr>
                            <tr>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    No. of Head
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Organ/s
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Province
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Weight by Province (in kg)
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Area of Distribution (refer to code)
                                </th>
                                <th class="px-6 py-4 border text-center whitespace-nowrap">
                                    Weight by Area Distribution (in kg)
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @php
                                $totalMaleForSlaughter = 0;
                                $totalFemaleForSlaughter = 0;
                            @endphp

                            @foreach ($animalData as $data)
                                @php
                                    // Male Data
                                    $maleAnimals = $data['animals']->where('gender', 'male');
                                    $maleCount = $maleAnimals->count();
                                    $maleTotalWeight = $maleAnimals->sum('live_weight');
                                    $maleAverageWeight = $maleCount > 0 ? $maleTotalWeight / $maleCount : 0;

                                    $maleCondemnCount = $maleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'disposal';
                                        })
                                        ->count();

                                    $maleCondemnWeight = $maleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'disposal';
                                        })
                                        ->sum('anteMortem.dispose_weight');

                                    // Calculate "for slaughter" count for male
                                    $maleForSlaughterCount = $maleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'for slaughter';
                                        })
                                        ->count();

                                    $totalMaleForSlaughter += $maleForSlaughterCount;

                                    // Female Data
                                    $femaleAnimals = $data['animals']->where('gender', 'female');
                                    $femaleCount = $femaleAnimals->count();
                                    $femaleTotalWeight = $femaleAnimals->sum('live_weight');
                                    $femaleAverageWeight = $femaleCount > 0 ? $femaleTotalWeight / $femaleCount : 0;

                                    $femaleCondemnCount = $femaleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'disposal';
                                        })
                                        ->count();

                                    $femaleCondemnWeight = $femaleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'disposal';
                                        })
                                        ->sum('anteMortem.dispose_weight');

                                    // Calculate "for slaughter" count for female
                                    $femaleForSlaughterCount = $femaleAnimals
                                        ->filter(function ($animal) {
                                            return $animal->anteMortem && $animal->anteMortem->inspection_status === 'for slaughter';
                                        })
                                        ->count();

                                    $totalFemaleForSlaughter += $femaleForSlaughterCount;
                                @endphp

                                <tr class="border">
                                    <td rowspan="2" class="border">{{ $data['date'] }}</td>

                                    <!-- Male Row -->
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        Male
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap border">
                                        {{ $maleCount }}
                                    </td>
                                    <td rowspan="2" class="px-6 py-4 whitespace-nowrap border">
                                        @if ($data['animals']->isNotEmpty())
                                            {{-- Display the unique indices of the sources for both males and females --}}
                                            @php
                                                $uniqueSources = $data['animals']
                                                    ->pluck('source')
                                                    ->unique()
                                                    ->values();
                                                $sourceIndices = $uniqueSources
                                                    ->map(function ($source) use ($allFormData) {
                                                        return $allFormData->pluck('animal_source')->search($source) + 1;
                                                    })
                                                    ->implode(', ');
                                            @endphp
                                            {{ $sourceIndices }}
                                        @else
                                            <!-- Handle the case where source data is not found -->
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $maleAverageWeight }} kg
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border">
                                        {{ $maleCondemnCount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border">
                                        {{ $maleCondemnWeight }} kg
                                    </td>
                                    <td>for causes male</td>
                                    <td class="px-6 py-4 whitespace-nowrap border">{{ $maleForSlaughterCount }}</td>
                                </tr>

                                <!-- Female Row -->
                                <tr class="border">
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        Female
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap border">
                                        {{ $femaleCount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $femaleAverageWeight }} kg
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border">
                                        {{ $femaleCondemnCount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $femaleCondemnWeight }} kg
                                    </td>
                                    <td>for causes female</td>
                                    <td class="px-6 py-4 whitespace-nowrap border">{{ $femaleForSlaughterCount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-white ">
                            <tr class="border-t">
                                <th class="px-6 py-3 border">Total</th>

                                <!-- Initialize totals for each column -->

                                <!-- Display totals for the current column -->
                                <td class="px-6 py-3 border font-semibold"></td>
                                <td class="px-6 py-3 border font-semibold"></td>
                                <td class="px-6 py-3 border"></td>
                                <td class="px-6 py-3 border"></td>

                            </tr>
                        </tfoot>
                    </table>

                </div>



            </div>
        </div>


    </div>
    @section('admincontent')
    @endsection

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
