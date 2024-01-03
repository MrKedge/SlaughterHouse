<div id="popup-modal{{ $animals->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Dispatch Message
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                    data-modal-toggle="popup-modal{{ $animals->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('for.slaughter.animal', ['id' => $animals->id]) }}" method="post"
                class="p-4 md:p-5">
                @csrf

                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="col-span-2">

                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to
                            dispatch this Animal?</h3>

                    </div>


                </div>
                <button data-modal-hide="popup-modal" type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Yes, I'm sure
                </button>
            </form>
        </div>
    </div>
</div>

<div id="crud-modal{{ $animals->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Record Time of Arrival
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal{{ $animals->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('set.arrival', ['id' => $animals->id]) }}" method="post" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="animal" class="block mb-2 text-sm font-medium text-gray-900 ">Animal</label>
                        <p type="text" name="animal" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            {{ $animals->type }} </p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="animal" class="block mb-2 text-sm font-medium text-gray-900 ">Id</label>
                        <p type="text" name="animal" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            {{ $animals->id }} </p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Date</label>
                        <input name="dateOfArrival" required type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Time</label>
                        <input name="timeOfArrival" required type="time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">

                        </label>

                    </div>
                </div>
                <button type="submit"
                    class="gap-1 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    Continue
                </button>
            </form>
        </div>
    </div>
</div>

{{-- monitor animal modal --}}

<div id="monitor-modal{{ $animals->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="monitor-modal{{ $animals->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <form action="{{ route('admin.monitor.animal', ['id' => $animals->id]) }}" method="post">
                    @csrf
                    <svg class="mx-auto w-12 h-12" fill="#000000" viewBox="0 0 0.45 0.45" id="slaughterhouse"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.45 0.243c0 0.041 -0.041 0.021 -0.041 0.021L0.375 0.27H0.33a0.159 0.159 0 0 1 -0.045 0.06 0.098 0.098 0 0 1 -0.016 0.034c-0.002 0.003 -0.002 0.006 -0.002 0.01l0.003 0.069a0.008 0.008 0 0 1 -0.008 0.007 0.007 0.007 0 0 1 -0.007 -0.006L0.24 0.345H0.12v0.098a0.007 0.007 0 0 1 -0.007 0.007 0.007 0.007 0 0 1 -0.007 -0.006L0.09 0.36v-0.015a0.246 0.246 0 0 1 -0.043 -0.003A0.057 0.057 0 0 1 0.027 0.385c-0.004 0.002 -0.004 0.006 -0.004 0.012l0.006 0.046a0.007 0.007 0 0 1 -0.007 0.007 0.007 0.007 0 0 1 -0.007 -0.005l-0.013 -0.051a0.01 0.01 0 0 1 0.002 -0.009c0.013 -0.02 -0.001 -0.076 -0.001 -0.076A0.041 0.041 0 0 1 0 0.298V0.225a0.061 0.061 0 0 1 0.082 -0.057s0.003 0.001 0.004 0.001a0.455 0.455 0 0 0 0.114 0.001l0.005 -0.002a0.055 0.055 0 0 1 0.038 0 0.029 0.029 0 0 1 0.007 0.003 0.06 0.06 0 0 1 0.009 0.005A0.054 0.054 0 0 0 0.285 0.18h0.03V0.15l0.015 0.015c0.015 -0.045 0.075 -0.03 0.075 -0.03a0.051 0.051 0 0 0 -0.045 0.03l0.075 0.06a0.018 0.018 0 0 1 0.006 -0.002 0.01 0.01 0 0 1 0.009 0.01V0.243Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 pt-8">Are you sure you want to Monitor
                        this Animal?</h3>

                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>

                    <button data-modal-hide="monitor-modal{{ $animals->id }}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                        cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- printing qr --}}
<div id="print-qr-modal{{ $animals->id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative w-full max-w-md max-h-full  ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                <h3 class="hide-on-print-button text-xl font-medium text-gray-900 ">
                    Qr code
                </h3>
                <button type="button"
                    class="hide-on-print-button text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="print-qr-modal{{ $animals->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="hide-on-print"></div>
            <img class="mx-auto z-50 relative" src="{{ asset('storage/qr-code/' . $animals->qr_code) }}"
                alt="animal image">

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                <button onclick="printPage()" data-modal-hide="print-qr-modal{{ $animals->id }}" type="button"
                    class="hide-on-print-button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">
                    Print</button>
                <button data-modal-hide="print-qr-modal{{ $animals->id }}" type="button"
                    class="hide-on-print-button ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Cancel</button>
            </div>
        </div>
    </div>
</div>
