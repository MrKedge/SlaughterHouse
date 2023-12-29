<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'LRME report'])

<body class="bg-[#D5DFE8] ">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}
            <div class="flex flex-col w-full ml-[240px]">


                {{-- <section class="flex justify-evenly gap-3 pb-3 w-full h-auto px-4">
                 
               
                </section> --}}


                <div class="mx-auto w-full px-4">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg  border p-4">

                        <div class="flex justify-between ">

                            @include('admin.tabs.tabs')
                            @include('admin.tabs.search-bar')
                        </div>

                    </section>

                    <div class="flex text-start items-center mt-4 gap-4">
                        <h1 class=" text-gray-600 font-medium text-2xl rounded-lg px-5 ">
                            LRME</h1>

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
            {{-- End wrapper --}}
        </div>



        <div class="px-4 pt-4">
            <div class=" shadow-md sm:rounded-lg flex justify-center ml-[240px]">


                <div class="overflow-x-auto overflow-y-auto w-full h-[500px] sm:rounded-lg ">

                    <table class=" text-sm text-left text-gray-500">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            {{-- <h1 class=" text-gray-600 font-medium text-2xl rounded-lg px-5 ">
                                LRME</h1> --}}
                            <form action="{{ route('lrme.reports') }}" method="get">
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
                                </div>
                            </form>
                            {{-- <p class="mt-1 text-sm font-normal text-gray-500">This is the registered Animal for the
                                month of December.</p> --}}
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th rowspan="2" class="px-6 py-3 border">
                                    Date</th>
                                <!-- Loop through animal types and generate headers -->
                                @foreach ($animalTypes as $animalType)
                                    @if ($animalType !== null && $animalType !== '')
                                        <th scope="col" colspan="4" class="px-6 py-3 text-center border">
                                            {{ ucfirst($animalType) }}
                                        </th>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                {{-- <th scope="col" class="px-6 py-3 border"></th> --}}
                                <!-- Loop through animal types and generate subheaders -->
                                @foreach ($animalTypes as $animalType)
                                    @if ($animalType !== null && $animalType !== '')
                                        <th class="px-6 py-3 border">
                                            Head
                                        </th>
                                        <th class="px-6 py-3 border whitespace-nowrap">
                                            Carcass wt.
                                        </th>
                                        <th class="px-6 py-3 border">
                                            Source
                                        </th>
                                        <th class="px-6 py-3 border">
                                            Destination
                                        </th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through each date and display data -->
                            @foreach ($animalData as $day)
                                <tr class="even:bg-gray-100 odd:bg-white border-b">
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($day['date'])->format('d') }}</td>
                                    <!-- Loop through animal types and generate data columns -->
                                    @foreach ($animalTypes as $animalType)
                                        @php
                                            // Initialize variables for the current animal type
                                            $totalAnimalCount = 0;
                                            $totalPostWeight = 0;

                                            // Check if $day['animals'] is an array or object
                                            if (is_array($day['animals']) || is_object($day['animals'])) {
                                                // Loop through animals of the current type
                                                foreach ($day['animals'] as $animal) {
                                                    // Check if the animal is of the current type
                                                    if (isset($animal->type) && $animal->type === $animalType) {
                                                        // Check if postMortem data is available for the current animal
                                                        if (isset($animal->postMortem)) {
                                                            // Increment the total animal count for the current type
                                                            $totalAnimalCount++;

                                                            // Accumulate post_weight for the current animal
                                                            $totalPostWeight += $animal->postMortem->post_weight;
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp

                                        <!-- Display data only if $animalType is not empty or null -->
                                        @if ($animalType !== null && $animalType !== '')
                                            <td class="px-6 py-4">{{ $totalAnimalCount }}</td>
                                            <td class="px-6 py-4">{{ $totalPostWeight }}</td>
                                            <td class="px-6 py-4">
                                                {{-- Display other data --}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Display other data --}}
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-t">
                                <th class="px-6 py-3 border">Total</th>

                                <!-- Initialize totals for each column -->
                                @foreach ($animalTypes as $animalType)
                                    @php
                                        $totalAnimalCount = 0;
                                        $totalPostWeight = 0;
                                    @endphp

                                    <!-- Loop through each day and accumulate totals for the current column -->
                                    @foreach ($animalData as $day)
                                        @php
                                            // Check if $day['animals'] is an array or object
                                            if (is_array($day['animals']) || is_object($day['animals'])) {
                                                // Loop through animals of the current type
                                                foreach ($day['animals'] as $animal) {
                                                    // Check if the animal is of the current type
                                                    if (isset($animal->type) && $animal->type === $animalType) {
                                                        // Check if postMortem data is available for the current animal
                                                        if (isset($animal->postMortem)) {
                                                            // Increment the total animal count for the current type
                                                            $totalAnimalCount++;

                                                            // Accumulate post_weight for the current animal
                                                            $totalPostWeight += $animal->postMortem->post_weight;
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp
                                    @endforeach

                                    <!-- Display totals for the current column -->
                                    <td class="px-6 py-3 border">{{ $totalAnimalCount }}</td>
                                    <td class="px-6 py-3 border">{{ $totalPostWeight }}</td>
                                    <td class="px-6 py-3 border"></td>
                                    <td class="px-6 py-3 border"></td>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>

                </div>



            </div>
        </div>


    </div>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
