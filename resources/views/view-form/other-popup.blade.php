<div id="print-view-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    {{-- <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div> --}}
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
                    data-modal-hide="print-view-modal">
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
            <img class="mx-auto z-50 relative" src="{{ asset('storage/qr-code/' . $animal->qr_code) }}"
                alt="animal image">

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                <button onclick="printPage()" data-modal-hide="print-view-modal" type="button"
                    class="hide-on-print-button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">
                    Print</button>
                <button data-modal-hide="print-view-modal" type="button"
                    class="hide-on-print-button ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div id="privateButcher-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    {{-- <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div> --}}
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="privateButcher-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <form action="{{ route('private.butcher', ['id' => $animal->id]) }}" method="post">
                    @csrf
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div class="py-3">
                        <label for="cause" class="block mb-2 text-sm font-medium text-gray-900 ">Slaughtered
                            by:</label>
                        <input required name="privateButcher" readonly
                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                            class="cursor-not-allowed capitalize  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                            placeholder="{{ auth()->user()->firts_name }} {{ auth()->user()->last_name }}">

                    </div>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you slaughtered this animal?
                    </h3>
                    <button data-modal-hide="privateButcher-modal" type="submit"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>

                    <button data-modal-hide="privateButcher-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                        cancel</button>
                </form>
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
