<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'swine SSHPDP'])

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
                    <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg  border border-white p-4">

                        <div class="flex justify-between ">

                            <div class="text-gray-600"> @include('admin.tabs.tabs')</div>
                            @include('admin.tabs.search-bar')

                        </div>

                    </section>

                    <div class="flex text-start items-center mt-4 gap-4">
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
            {{-- End wrapper --}}
        </div>



        <div class="px-4 pt-4">
            <div class=" shadow-md sm:rounded-lg flex justify-center ml-[240px]">


                <div
                    class="overflow-x-auto overflow-y-auto w-full h-[500px] sm:rounded-lg rounded-b-xl border border-white">

                    <table class=" text-sm text-left text-gray-500">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">

                            <form action="{{ route('lrme.reports') }}" method="get">
                                @csrf
                                <div class="flex items-center gap-3">
                                    <label for="start_date">Date:</label>
                                    <div>
                                        <input id="start_date" name="start_date" required type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            value="">
                                    </div>
                                    <label for="end_date">to</label>
                                    <div>
                                        <input id="end_date" name="end_date" required type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            value="">
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
                                        class="ml-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">

                                        <option selected>Destination</option>

                                    </select>

                                </div>

                            </form>
                            {{-- <p class="mt-1 text-sm font-normal text-gray-500">This is the registered Animal for the
                                month of December.</p> --}}
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th colspan="19" class="px-6 py-4 border text-center">
                                    DAILY ANIMAL INSPECTION AND SLAUGHTER REPORT
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="3" class="px-6 py-4 border">
                                    Date
                                </th>
                                <th rowspan="3" class="px-6 py-4 border">
                                    Sex of Species
                                </th>
                                <th rowspan="3" class="px-6 py-4 border">
                                    No. of Head Received
                                </th>
                                <th rowspan="3" class="px-6 py-4 border">
                                    Origin (refer to code)
                                </th>
                                <th rowspan="3" class="px-6 py-4 border">
                                    Average Live weight per head (in kg)
                                </th>
                                <th colspan="4" class="px-6 py-4 border">
                                    Ante-Mortem Inspection
                                </th>
                                <th rowspan="3" class="px-6 py-4 border">
                                    Average Carcass Weight per head (in kg)
                                </th>
                                <th colspan="5" class="px-6 py-4 border">
                                    Post-Mortem Inspection
                                </th>
                                <th colspan="4" class="px-6 py-4 border">
                                    Destination of Meat
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="px-6 py-4 border">
                                    Condemnation
                                </th>
                                <th rowspan="2" class="px-6 py-4 border">
                                    No. Head Fit For Slaughter
                                </th>
                                <th colspan="2" class="px-6 py-4 border">
                                    Carcass/es Condemned
                                </th>
                                <th colspan="3" class="px-6 py-4 border">
                                    Organ/s Condemned
                                </th>
                                <th colspan="2" class="px-6 py-4 border">
                                    Outside the Province
                                </th>
                                <th colspan="2" class="px-6 py-4 border">
                                    Within the Province
                                </th>
                            </tr>
                            <tr>
                                <th class="px-6 py-4 border">
                                    No. of Head
                                </th>
                                <th class="px-6 py-4 border">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border">
                                    Organ/s
                                </th>
                                <th class="px-6 py-4 border">
                                    Weight (in kg)
                                </th>
                                <th class="px-6 py-4 border">
                                    Cause/s
                                </th>
                                <th class="px-6 py-4 border">
                                    Province
                                </th>
                                <th class="px-6 py-4 border">
                                    Weight by Province (in kg)
                                </th>
                                <th class="px-6 py-4 border">
                                    Area of Distribution (refer to code)
                                </th>
                                <th class="px-6 py-4 border">
                                    Weight by Area Distribution (in kg)
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="border">
                                <td rowspan="2" class="border">2023-01-01</td>
                                <th class="px-6 py-4 whitespace-nowrap">
                                    Male
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    5<!-- No. of Head Received for Male -->
                                </td>
                                <td rowspan="2" class="px-6 py-4 whitespace-nowrap border">
                                    2 <!-- Origin (refer to code) shared for both Male and Female -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    3 <!-- Average Live Weight per Head (in kg) for Male -->
                                </td>
                            </tr>
                            <tr class="border">
                                <th class="px-6 py-4 whitespace-nowrap">
                                    Female
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    22<!-- No. of Head Received for Female -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    23<!-- Average Live Weight per Head (in kg) for Female -->
                                </td>
                            </tr>
                            <!-- Add more rows for each day -->
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
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
