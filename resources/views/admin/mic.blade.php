<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'mic'])

<body class="bg-[#D5DFE8] ">

    <style>
        select {
            /* Remove default arrow icon */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Add your custom styling here */
        }
    </style>
    <div id="extralarge-modal" tabindex="-1"
        class="fixed text-sm max-h-6xl top-0 left-0 right-0 z-50 flex justify-center w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex  items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <div class="flex gap-3 justify-center w-full font-medium text-gray-900 ">
                        <img class="w-24" src="{{ asset('images/miclogo.jpg') }}" alt="">
                        <div class="text-center">
                            <p>Republic of the Philippines</p>
                            <p>Province of Marinduque</p>
                            <p>MUNICIPALITY OF BOAC</p>
                            <h1 class="text-[#EE6C4D]">SLAUGHTECH</h1>
                        </div>
                    </div>
                    <a href="{{ route('complete.animals') }}"
                        class="hide-on-print-button text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>

                        <span class="sr-only">Close modal</span>
                    </a>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="text-base leading-relaxed text-gray-500 flex justify-center gap-40 ">
                        <div class="grid  grid-cols-2 gap-36 ">
                            <div class="relative z-0 max-w-sm mb-5 group">
                                <div class="relative flex whitespace-nowrap max-w-sm z-0 mb-5 group ">
                                    <label for="" class="">Name of Establishment:</label>
                                    <input type="text" placeholder="" class="border-b-2 border-black">
                                </div>
                                <div class="relative flex whitespace-nowrap max-w-sm z-0 mb-5 group ">
                                    <label for="" class="">License to Operate No.
                                    </label>
                                    <input type="text" placeholder="" class="border-b-2 border-black">
                                </div>
                            </div>
                            <div class="relative z-0 max-w-sm mb-5 group">
                                <div class="relative flex whitespace-nowrap max-w-sm z-0 mb-5 group ">
                                    <label for="" class="">No: </label>
                                    <input type="text" placeholder="" class="border-b-2 border-black">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-base text-center leading-relaxed text-gray-500 ">
                        <h1 class="text-2xl ">MEAT INSPECTION CERTIFICATE</h1>
                    </div>
                    <div class="text-base leading-relaxed text-gray-500 text-center">
                        <p>This certifies that the meat described below are from animals </p>
                        <p>that were subjected to ante-mortem and post-mortem inspection and that, at the time </p>
                        <p>and date of inspection were found to be fit for human consumption.</p>
                    </div>
                    <div class="text-base leading-relaxed text-gray-500 ">
                        <div class=" gap-4">
                            <div class="w-full text-center">
                                @php
                                    $groupedAnimals = $animals->groupBy('type');
                                    $meatTypes = [];

                                    // Fetch meat type mappings from form_maintenance table
                                    $meatTypeMappings = DB::table('form_maintenances')->pluck('meat_type', 'animal_type');

                                    // Loop through the mappings and build the $meatTypes array
                                    foreach ($meatTypeMappings as $animalType => $meatType) {
                                        $meatTypes[$animalType] = $meatType;
                                    }
                                @endphp
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-black">TYPE OF MEAT</th>
                                            <th class="text-black">QUANTITY</th>
                                            <th class="text-black">WEIGHT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groupedAnimals as $type => $animalsOfType)
                                            <tr>
                                                <td class="border-b-2">
                                                    {{ $meatTypes[$type] ?? 'Unknown' }} {{-- Display meat type based on animal type --}}
                                                </td>
                                                <td class="border-b-2">{{ $animalsOfType->count() }}</td>
                                                <td class="border-b-2">
                                                    {{ $animalsOfType->sum(function ($animal) {
                                                        return optional($animal->postMortem)->post_weight ?? 0;
                                                    }) }}
                                                    Kg
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="text-base leading-relaxed text-gray-500 ">
                        <p> Other information relevant to its distribution are as follows:
                        </p>
                    </div>
                    <div class="text-base leading-relaxed text-gray-500 ">
                        <div class="flex justify-evenly whitespace-nowrap  ">
                            <table class="w-full text-center">
                                <thead>

                                </thead>
                                <tbody class="border">
                                    <tr class="border">
                                        <td>Name of Owner/Dealer:</td>

                                        <td class="text-black">{{ $owner->first_name }} {{ $owner->last_name }}</td>
                                    </tr class="border">
                                    <tr class="border">
                                        <td>Conveyance used and Plate No.
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="border">
                                        <td>Date Issued:
                                        </td>
                                        <td class="text-black">
                                            {{ \Carbon\Carbon::parse($newMic->created_at)->format('M d Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="w-full text-center">
                                <thead>

                                </thead>
                                <tbody class="border">
                                    <tr class="border">
                                        <td>Destination:
                                        </td>

                                        <td class="text-black"></td>
                                    </tr>
                                    <tr class="border">
                                        <td>MTV Accreditation No.

                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="border">
                                        <td>Time Issued:
                                        </td>
                                        <td class="text-black">
                                            {{ \Carbon\Carbon::parse($newMic->created_at)->format('h:i:s A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-base text-end leading-relaxed text-gray-500 ">
                        <p>CERTIFIED TRUE AND CORRECT BY:
                        </p>
                    </div>
                    <div class="text-base text-end leading-relaxed text-gray-500 ">

                        <select id="role" name="role" required
                            class="uppercase text-black font-semibold text-center">
                            @foreach ($inspector as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        <p>Meat Inspector III</p>

                    </div>
                    <div class="text-base text-start leading-relaxed text-gray-500 ">
                        <p>Received by:
                        </p>
                    </div>
                    <div class="text-base text-start leading-relaxed text-gray-500 ">
                        <p class="uppercase text-black">{{ $owner->first_name }} {{ $owner->last_name }}</p>
                        <p>Owner/Dealer/Authorized Representative
                        </p>

                        <p> (signature Over Printed Name) </p>

                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex justify-end items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b ">
                    <div data-dial-init class=" flex justify-end  top-6 group hide-on-print-button">
                        <div id="speed-dial-menu-horizontal" class="hidden ">

                            <div class="flex items-center me-4 space-x-2 rtl:space-x-reverse">
                                <button onclick="printPage()" type="button" data-tooltip-target="tooltip-print"
                                    data-tooltip-placement="top"
                                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 :border-gray-600 shadow-sm :hover:text-white :text-gray-400 hover:bg-gray-50 :bg-gray-700 :hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none :focus:ring-gray-400">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
                                        <path
                                            d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
                                    </svg>
                                    <span class="sr-only">Print</span>
                                </button>
                                {{-- <div id="tooltip-print" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip :bg-gray-700">
                                    Print
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div> --}}
                                <button onclick="saveAsPDF()" data-tooltip-target="tooltip-download"
                                    data-tooltip-placement="top"
                                    class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 :border-gray-600 shadow-sm :hover:text-white :text-gray-400 hover:bg-gray-50 :bg-gray-700 :hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none :focus:ring-gray-400">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                        <path
                                            d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Download Pdf</span>
                                </button>
                                {{-- <div id="tooltip-download" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip :bg-gray-700">
                                    Download
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div> --}}
                                <button type="button" data-tooltip-target="tooltip-copy"
                                    data-tooltip-placement="top"
                                    class="hide-on-print-button flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 :border-gray-600 :hover:text-white shadow-sm :text-gray-400 hover:bg-gray-50 :bg-gray-700 :hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none :focus:ring-gray-400">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z" />
                                        <path
                                            d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z" />
                                    </svg>
                                    <span class="sr-only">Copy</span>
                                </button>
                                {{-- <div id="tooltip-copy" role="tooltip"
                                    class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip :bg-gray-700">
                                    Copy
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div> --}}
                            </div>
                        </div>
                        <button type="button" data-dial-toggle="speed-dial-menu-horizontal"
                            aria-controls="speed-dial-menu-horizontal" aria-expanded="false"
                            class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 :bg-blue-600 :hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none :focus:ring-blue-800">
                            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                            <span class="sr-only">Open actions menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printPage() {
            // Add opacity-0 class to hide other buttons
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.add('opacity-0');
            });

            // Toggle opacity and apply backdrop styles to the elements with class 'hide-on-print' before printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.add('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Trigger the print function
            window.print();

            // Remove the applied styles and show other buttons after printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.remove('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Remove opacity-0 class to show other buttons after printing
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.remove('opacity-0');
            });
        }
    </script>
</body>

</html>




<!-- Modal toggle -->
