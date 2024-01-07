<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'mic'])

<body class="bg-[#D5DFE8] ">


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
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="extralarge-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
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
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-black">TYPE OF MEAT</th>
                                            <th class="text-black">QUANTITY</th>
                                            <th class="text-black">WEIGHT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $groupedAnimals = $animals->groupBy('type');
                                        @endphp
                                        @foreach ($groupedAnimals as $type => $animalsOfType)
                                            <tr>
                                                <td class="border-b-2">{{ $type }}</td>
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
                        <p>Meat Inspector III
                        </p>
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
                    class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b ">
                    <button data-modal-hide="extralarge-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">I
                        accept</button>
                    <button data-modal-hide="extralarge-modal" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>




<!-- Modal toggle -->
