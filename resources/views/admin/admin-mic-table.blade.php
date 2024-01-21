<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'MIC'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col w-full">




            <div class="mx-auto w-full px-4 mt-20">
                <form action="{{ route('generate.mic') }}" method="get" id="animalForm">
                    @csrf {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}



                    <div class="text-end w-full pr-3">
                        <div id="mic-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            {{-- <div
                                    class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity">
                                </div> --}}
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow ">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                        data-modal-hide="mic-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 "
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>


                                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you
                                            want to
                                            generate MIC for this Animals?</h3>
                                        <button id="generateBtn" data-modal-hide="mic-modal"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="mic-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="selected_animals" id="selectedAnimalsInput">
                    {{-- selected animal input --}}
                    <div class="text-2xl font-bold py-3"></div>
                    <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                        <table class="w-full text-center text-base capitalize font-medium text-gray-500 ">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                                <div class="flex items-center justify-between">
                                    <h1>Meat Inspection Certificate</h1>
                                    <button data-modal-target="mic-modal" data-modal-toggle="mic-modal" type="button"
                                        class="generateBtn px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                        </svg>
                                        Generate
                                    </button>
                                </div>
                                <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                    {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
                            </caption>
                            <thead class="text-xs text-white uppercase bg-[#37B5B6]">

                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            @if (count($animal) > 0)
                                                <input id="checkbox-all" type="checkbox"
                                                    class="animal-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amimal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Owner
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Completed Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Completed Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>


                            @forelse ($animal as $animals)
                                <tbody>
                                    <tr
                                        class="{{ $loop->even ? 'bg-white' : 'bg-white' }} border-b cursor-pointer border-gray-300 hover:bg-gray-100">
                                        <td class="w-4 p-4">
                                            <input id="checkbox-table-{{ $animals->id }}" type="checkbox"
                                                class="animal-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                            <label for="checkbox-table-{{ $animals->id }}" class="sr-only">checkbox</label>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap ">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            @include('admin.layout.animals-popover')
                                        </td>
                                        <td scope="row"
                                            class="flex items-center px-6 py-4 text-gray-600 whitespace-nowrap">

                                            <div class=" text-center w-full">
                                                <div class="text-sm font-medium "> {{ $animals->user->first_name }}
                                                    {{ $animals->user->last_name }}</div>
                                                <div class="font-normal text-gray-500 lowercase">{{ $animals->user->email }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ optional($animals->completed)->created_at ? \Carbon\Carbon::parse($animals->completed->created_at)->format('M d Y') : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ optional($animals->completed)->created_at ? \Carbon\Carbon::parse($animals->completed->created_at)->format('h:i A') : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-[#38419D]">
                                            <div class="flex justify-center gap-3">
                                                <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                    data-tooltip-target="tooltip-Viewform{{ $animals->id }}"
                                                    data-tooltip-style="light"
                                                    class="transition ease-in-out delay-150 hover:-translate-y-1 duration-300   font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span></span>
                                                </a>
                                                <div id="tooltip-Viewform{{ $animals->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                    View form
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 bg-white text-center border-b border-gray-300">
                                        <h1 class="font-semibold italic pb-3">No Animal</h1>
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                        <div class="flex p-4 bg-white text-[#38419D]">
                            <!-- Previous Button -->
                            @if ($animal->previousPageUrl())
                                <a href="{{ $animal->previousPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium  bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                    </svg>
                                    <span> Previous</span>
                                </a>
                            @endif
                            @if ($animal->hasMorePages())
                                <a href="{{ $animal->nextPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 text-sm font-medium  bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                                    Next
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>


                </form>
            </div>

        </div>
    @endsection

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        $(document).ready(function() {
            var selectedAnimals = []; // Array to store selected animal IDs

            // Handle the checkbox in the header
            $('#checkbox-all').change(function() {
                // Check or uncheck all checkboxes in the body based on the header checkbox
                $('.animal-checkbox').prop('checked', $(this).prop('checked'));

                // Update the selectedAnimals array based on the header checkbox
                selectedAnimals = getSelectedAnimalIds();

                // Log the selected animals (for demonstration purposes)
                console.log(selectedAnimals);
                updateSelectedAnimalsInput();
                updateButtonState();
            });

            // Handle individual checkboxes in the body
            $('.animal-checkbox').change(function() {
                // Uncheck the header checkbox if any checkbox in the body is unchecked
                if (!$(this).prop('checked')) {
                    $('#checkbox-all').prop('checked', false);
                }

                // Update the selectedAnimals array based on individual checkbox changes
                selectedAnimals = getSelectedAnimalIds();

                // Log the selected animals (for demonstration purposes)
                console.log(selectedAnimals);
                updateSelectedAnimalsInput();
                updateButtonState();
            });

            function getSelectedAnimalIds() {
                // Get the IDs of checked animal checkboxes
                return $('.animal-checkbox:checked').map(function() {
                    return $(this).val() === 'on' ? $(this).attr('id') : $(this).val();
                }).get();
            }

            function updateSelectedAnimalsInput() {
                // Extract numeric IDs from checkbox IDs
                var numericIds = selectedAnimals.map(function(checkboxId) {
                    return checkboxId.replace('checkbox-table-', '');
                });

                // Update the hidden form input with the selected animal IDs
                $('#selectedAnimalsInput').val(JSON.stringify(numericIds));
            }

            function updateButtonState() {
                var button = $('.generateBtn');
                var isChecked = anyCheckboxChecked();
                button.prop('disabled', !isChecked);
                button.toggleClass('cursor-not-allowed bg-gray-300', !isChecked);
            }

            function anyCheckboxChecked() {
                var checkboxes = document.querySelectorAll('.animal-checkbox, input[name="main-checkbox"]');
                return Array.from(checkboxes).some(function(checkbox) {
                    return checkbox.checked;
                });
            }

            // Attach change event listeners to checkboxes
            $('.animal-checkbox, input[name="main-checkbox"]').change(function() {
                updateButtonState();
            });

            // Initial state setup
            updateButtonState();
        });
    </script>
</body>

</html>
