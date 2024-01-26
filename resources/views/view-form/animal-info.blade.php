<section class="bg-white">
    <div class="py-8 px-4 max-w-2xl ">
        <h2 class="mb-4 text-xl font-bold text-gray-900 "></h2>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            @if ($animal->status === 'rejected' || $animal->status === 'receipt invalid')
                <div class="col-span-2">
                    <div id="alert-additional-content-2"
                        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            @if ($animal->status === 'rejected')
                                <h3 class="text-lg font-medium">Reject Remarks</h3>
                            @elseif($animal->status === 'receipt invalid')
                                <h3 class="text-lg font-medium">Receipt Notice</h3>
                            @endif
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            <h1>
                                @if ($animal->status === 'rejected')
                                    {{ $animal->remarks }}
                                @endif
                                @if ($animal->status === 'receipt invalid')
                                    {{ $animal->receipt->receipt_remarks }}
                                @endif
                            </h1>
                        </div>
                        <div class="flex">
                            @if ($animal->status === 'rejected')
                                <button type="button"
                                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center ">
                                    <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 14">
                                        <path
                                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                    </svg>
                                    Update form
                                </button>
                            @endif
                            <button type="button"
                                class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center "
                                data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                                Dismiss
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Owner:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->user->first_name }} {{ $animal->user->last_name }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Email:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->user->email }}

                </h1>
            </div>
            @if ($animal->user->role !== 'admin')
                <div class="w-full">

                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Address:</label>
                    <h1 type="text" name="name" id="name"
                        class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                        {{ $animal->user->address }}

                    </h1>

                </div>
            @endif
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Animal Type:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->type }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Live Weight (Kg):</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->live_weight }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Age (Months):</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->age }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Gender:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->gender }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Destination:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->destination }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Source:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->source }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Butcher:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->butcher }}

                </h1>
            </div>

            <div class="w-full">
                @if ($animal->type === 'swine')
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Age Classification (Swine Only):</label>
                    <h1 type="text" name="name" id="name"
                        class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                        {{ $animal->age_classify }}

                    </h1>
                @endif
            </div>


            <div class="flex gap-2 whitespace-nowrap">
                <button data-modal-target="image-modal" data-modal-toggle="image-modal"
                    class="flex items-center mx-auto px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    View Documents
                </button>
                @if ($animal->animal_mark)
                    <button data-modal-target="mark-modal" data-modal-toggle="mark-modal"
                        class="flex items-center mx-auto px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-[#f1623e] hover:bg-[#EE6C4D]/90 text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>

                        View marks
                    </button>
                @endif
            </div>
        </div>

    </div>
</section>

@include('view-form.image-modal')
