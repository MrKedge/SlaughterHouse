<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Stab'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.1/mammoth.browser.min.js"></script>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}

        @include('admin.layout.admin-header')

        <div class="flex">

            {{-- <div class="fixed">@include('admin.layout.admin-sidepanel')</div> --}}




            <div class="flex flex-col w-full">


                <section class="flex justify-evenly gap-3 py-3 h-auto">

                </section>


                <div class="">


                    <section class="p-4">


                        <div
                            class=" overflow-y-auto overflow-x-hidden fixed  top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity">
                            </div>
                            <div class="relative mx-auto top-5  w-full max-w-md max-h-full ">
                                <!-- Modal content -->
                                <div class="relative rounded-lg shadow bg-gray-700 ">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-2 pl-4 border-b rounded-t border-gray-600 ">
                                        <h3 class="text-lg font-semibold  text-white">
                                            Stub
                                        </h3>
                                        <a href="{{ route('issuing.stub') }}" class="text-lg font-semibold  text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                    d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </a>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 hide-on-print ">

                                        <div class="mx-auto max-w-sm bg-white p-4  rounded-sm mb-2">
                                            <div class="flex justify-between">
                                                <h1 class="inline-block"></h1>
                                                <h1>Id: {{ $newStub->id }}</h1>
                                            </div>


                                            <section class="max-w-sm mx-auto p-5 border border-black ">

                                                <div class="mb-5">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900">
                                                        TIME & DATE:
                                                    </label>
                                                    <p
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                        {{ \Carbon\Carbon::parse(now())->format('M d Y h:i A') }}

                                                    </p>
                                                </div>
                                                <div class="mb-5">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">
                                                        NAME:
                                                    </label>
                                                    <p
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                        {{ $owner->first_name }} {{ $owner->last_name }}
                                                    </p>
                                                </div>
                                                <div class="mb-5">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">
                                                        NO. OF HEADS:
                                                    </label>
                                                    <p
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        {{ $totalAnimal }}
                                                    </p>
                                                </div>
                                                <div class="mb-5">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">
                                                        LIVE WEIGHTS:
                                                    </label>
                                                    <p
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        {{ $weightTotal }}
                                                    </p>
                                                </div>
                                                <div class="flex items-start mb-5">
                                                    <p for="terms" class="ms-2 text-sm font-medium text-gray-900 ">
                                                        NOTE:
                                                    </p>
                                                    <!-- Include the note value from the $animal object here -->
                                                </div>
                                                <p
                                                    class="text-gray-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                                    Meat Inspector III
                                                </p>

                                            </section>

                                        </div>


                                        <div data-dial-init class=" flex justify-end  top-6 group hide-on-print-button">
                                            <div id="speed-dial-menu-horizontal" class="hidden ">

                                                <div class="flex items-center me-4 space-x-2 rtl:space-x-reverse">
                                                    <button onclick="printPage()" type="button"
                                                        data-tooltip-target="tooltip-print" data-tooltip-placement="top"
                                                        class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 :border-gray-600 shadow-sm :hover:text-white :text-gray-400 hover:bg-gray-50 :bg-gray-700 :hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none :focus:ring-gray-400">
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 20 20">
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
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 20 20">
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
                                                        <svg class="w-5 h-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 18 20">
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
                                                <svg class="w-5 h-5 transition-transform group-hover:rotate-45"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                                <span class="sr-only">Open actions menu</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </section>
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
