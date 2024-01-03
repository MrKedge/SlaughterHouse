<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Generate Stab'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="flex flex-col w-full ml-[240px]">


                <section class="flex justify-evenly gap-3 pb-3 w-full h-auto px-4">
                    {{-- wrapper --}}
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        </div>

                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                </section>


                <div class="mx-auto w-full px-4">
                    <form action="{{ route('issue.stab') }}" method="get" id="animalForm">
                        @csrf {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                        <section
                            class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg border-white border-2 p-4">

                            <div class="flex items-center gap-6">
                                <h1
                                    class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80 whitespace-nowrap">
                                    Stab generation
                                </h1>


                                <div class="text-end w-full pr-3">
                                    <div id="generate-modal" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div
                                            class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity">
                                        </div>
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                    data-modal-hide="generate-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 "
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                    </svg>


                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you
                                                        want to
                                                        generate stab for this Animals?</h3>
                                                    <button id="generateBtn" data-modal-hide="generate-modal"
                                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="generate-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="selected_animals" id="selectedAnimalsInput">
                                    {{-- selected animal input --}}
                                    <button data-modal-target="generate-modal" data-modal-toggle="generate-modal"
                                        type="button"
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

                            </div>
                            <div class="scrollbar-gutter overflow-y-auto h-[420px]">
                                <table class="w-full text-center">
                                    <thead class="">
                                        <tr>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                <input id="checkbox-all" type="checkbox"
                                                    class="animal-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Id
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Arrival Date
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Arrival Date
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Arrival Time
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Animals
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Status
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @forelse($animal as $animals)
                                            <tr class="border border-black">
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    <input id="checkbox-table-{{ $animals->id }}" type="checkbox"
                                                        class="animal-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                    <label for="checkbox-table-{{ $animals->id }}"
                                                        class="sr-only">checkbox</label>
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $animals->id }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize  font-semibold">
                                                    {{ $animals->user->last_name }} {{ $animals->user->first_name }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ optional($animals->anteMortem)->arrived_at }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ optional($animals->anteMortem)->arrived_at }}
                                                </td>
                                                <td class="py-4 border-b border-black font-semibold capitalize">

                                                    {{ $animals->type }}

                                                </td>
                                                <td class="py-4 border-b border-black font-semibold capitalize">

                                                    {{ $animals->status }}

                                                </td>
                                                <td class="border-b border-black font-semibold capitalize">
                                                    <div class="flex justify-center gap-3">

                                                        <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                            class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                data-slot="icon" class="w-6 h-6">
                                                                <path
                                                                    d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                            </svg>

                                                            <span></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7"
                                                    class="py-4 border-b border-black text-center h-[500px]">
                                                    <h1 class="font-semibold italic pb-3">No Animals Found</h1>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </form>
                </div>
            </div>



            {{-- End wrapper --}}
        </div>



    </div>
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

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
