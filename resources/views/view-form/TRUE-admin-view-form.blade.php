<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'form'])

<body class="bg-[#D5DFE8]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex">


            <section class=" h-full w-full rounded-md mx-3 drop-shadow-2xl m-10 bg-gray-50">

                <div class=" border-b border-gray-300 bg-white">
                    <h1 class="mt-3  text-2xl font-bold text-left pl-6 pb-6 text-[#293241] ">
                        ANIMAL
                        DETAILS</h1>
                    <h1 class="pl-6 text-2xl font-medium text-[#293241]">
                        ID:<span> {{ $animal->id }}</span></h1>
                    <div class="flex justify-between items-center">
                        <h1 class="pl-6 pb-3 text-2xl font-medium text-[#293241]">
                            Status: @include('admin.formhandler.form-status')
                        </h1>

                        <div class="">
                            @if ($animal->qr_code !== null)
                                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                                    class="z-20 pr-2 flex text-sm bg-transparent rounded-full md:me-0" type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <i
                                        class='bx bx-qr-scan text-[24px] text-gray-900 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                                </button>
                            @endif
                            <div id="dropdownAvatar"
                                class=" hidden z-10 text-end bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute">
                                <img class="mx-auto" src="{{ asset('storage/qr-code/' . $animal->qr_code) }}"
                                    alt="animal image">
                                <div class="py-2">
                                    <button data-modal-target="print-view-modal" data-modal-toggle="print-view-modal"
                                        type="button"
                                        class="  text-white font-medium py-1 px-3 rounded-lg flex items-center text-sm">
                                        <i
                                            class='bx bx-printer text-[24px] text-gray-900 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-10 mx-auto">
                    <!-- Modal toggle -->
                    <div class="relative w-full h-full  md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white dark:bg-gray-50">
                            <!-- Modal header -->
                            <h1 class="font-bold pointer-events-none text-lg italic pl-12 pt-6">Owner
                                Information
                            </h1>
                            <!-- Modal body -->
                            <div class="grid gap-4 mb-4 sm:grid-cols-2 px-12">
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Owner
                                        Name:</label>

                                    <p id="ownerName"
                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        {{ $animal->user->first_name }} {{ $animal->user->last_name }}
                                    </p>
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Address:</label>
                                    <p id="address"
                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->user->address }}

                                    </p>
                                </div>


                            </div>
                            <h1 class="font-bold pointer-events-none text-lg italic pl-12">Animal Information
                            </h1>
                            <!-- Modal body -->
                            <div class="grid gap-4 mb-4 sm:grid-cols-2 max-w-2xl px-12">
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Animal
                                        Type:</label>

                                    <p id="ownerName"
                                        class="font-medium capitalize  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        {{ $animal->type }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Destination:</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->destination }}

                                    </p>
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Source:</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->source }}

                                    </p>
                                </div>

                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Butcher:</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->butcher }}

                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Gender:</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->gender }}

                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Age:</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->age }}

                                    </p>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Live
                                        Wt. (Kilogram):</label>
                                    <p id="address"
                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        {{ $animal->live_weight }}

                                    </p>
                                </div>
                                @if ($animal->type === 'swine')
                                    <div>
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Age
                                            Classification:</label>
                                        <p id="address"
                                            class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                            {{ $animal->age_classify }}

                                        </p>
                                    </div>
                                @endif
                                <div class="relative">
                                    <button data-modal-target="image-modal" data-modal-toggle="image-modal"
                                        class="block absolute bottom-0 max-h-12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        View Documents
                                    </button>
                                </div>

                            </div>
                            <!-- Modal body -->
                            @if ($animal->type === 'cow' || $animal->type === 'carabao' || $animal->type === 'horse')
                                @csrf
                                <div class="grid gap-4 mb-4 sm:grid-cols-1 px-12">

                                    <div id="marks-color" data-accordion="collapse"
                                        data-active-classes="bg-gray-300 text-gray-900 dark:text-gray-900">
                                        <h2 id="accordion-color-heading-1">
                                            <button type="button"
                                                class="flex mt-4 items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-700 rounded-t-xl focus:ring-1 focus:ring-gray-900 hover:bg-gray-200 gap-3"
                                                data-accordion-target="#accordion-color-body-1" aria-expanded="false"
                                                aria-controls="accordion-color-body-1">
                                                <span>Animal Marks</span>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-color-body-1" class="hidden"
                                            aria-labelledby="accordion-color-heading-1">
                                            <div class="p-5 border border-gray-200 dark:border-gray-700 ">
                                                <div class="mt-5 w-full bg-white  rounded-sm px-3 mb-6 ">
                                                    {{-- Mark of animal --}}

                                                    <section class="min-h-[350px]  border border-black ">
                                                        <img class="w-full"
                                                            src="{{ asset('storage/marked-animal/' . $animal->animal_mark) }}">
                                                    </section>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            @endif


                        </div>
                        <h1 class="font-bold pointer-events-none text-lg italic pl-12 ">Documents:
                        </h1>
                        <!-- Modal body -->

                        <div class="grid gap-4 mb-4 sm:grid-cols-4 px-12 bg-gray-50">

                            {{-- image place --}}


                        </div>

                        @if ($animal->status !== 'pending')
                            <h1 class="font-bold pointer-events-none text-lg italic pl-12">Inspection:
                            </h1>
                            <!-- Modal body -->
                            <div class="grid gap-4 mb-4 sm:grid-cols-1 px-12">



                                {{-- Ante Mortem --}}
                                <div id="inspection-color" data-accordion="collapse"
                                    data-active-classes="bg-gray-300 text-gray-900 dark:text-gray-900">
                                    <h2 id="accordion-color-heading-1">
                                        <button type="button"
                                            class="flex mt-4 items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-700 rounded-t-xl focus:ring-1 focus:ring-gray-900 hover:bg-gray-200 gap-3"
                                            data-accordion-target="#inspection-color-body-1" aria-expanded="false"
                                            aria-controls="inspection-color-body-1">
                                            <span>Ante Mortem</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="inspection-color-body-1" class="hidden"
                                        aria-labelledby="accordion-color-heading-1">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 ">


                                            <div class="grid gap-4 mb-4 sm:grid-cols-4 px-12">
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Time
                                                        of Arrival
                                                    </label>

                                                    <p id="ownerName"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->anteMortem->arrived_at ?? 'N/A' }}

                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Inspected
                                                        Time:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->anteMortem->inspected_at ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">
                                                        Inspected by:</label>
                                                    <p
                                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->anteMortem->examined_by ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Result:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->anteMortem->inspection_status ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Schedule
                                                        of Slaughter:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->schedule->scheduled_at ?? 'N/A' }}
                                                    </p>
                                                </div>

                                                @if (optional($animal->anteMortem)->inspection_status === 'disposal')
                                                    <div>
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Causes:</label>
                                                        <p id="address"
                                                            class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            {{ $animal->anteMortem->causes ?? 'N/A' }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Remarks:</label>
                                                        <p id="address"
                                                            class="font-medium min-h-[40px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            rows="3" name="ante_remarks">
                                                            {{ $animal->anteMortem->ante_remarks ?? 'N/A' }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>


                                        </div>
                                    </div>

                                    <h2 id="accordion-color-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-700 focus:ring-1 focus:ring-gray-900 hover:bg-gray-200 gap-3"
                                            data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                                            aria-controls="accordion-color-body-2">
                                            <span>Post Mortem</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-color-body-2" class="hidden"
                                        aria-labelledby="accordion-color-heading-2">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

                                            <div class="grid gap-4 mb-4 sm:grid-cols-4 px-12">
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Butchered
                                                        Time:

                                                    </label>

                                                    <p id="butcheredTime"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->slaughtered_at ?? 'N/A' }}

                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Butchered
                                                        by:

                                                    </label>

                                                    <p id="butcheredTime"
                                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->slaughtered_by ?? 'N/A' }}

                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Inspected
                                                        Time:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->checked_at ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Result:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->postmortem_status ?? 'N/A' }}
                                                    </p>
                                                </div>


                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Weight:</label>
                                                    <p id="address"
                                                        class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->post_weight ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Inspected
                                                        by:</label>
                                                    <p id="address"
                                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem->inspected_by ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">
                                                        Contain condemn carcass:
                                                    </label>
                                                    <p id="address"
                                                        class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        {{ $animal->postMortem ? $animal->condemnCarcasses->count() : 0 }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <h2 id="accordion-color-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-700 focus:ring-1 focus:ring-gray-900 hover:bg-gray-200 gap-3"
                                            data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                                            aria-controls="accordion-color-body-3">
                                            <span>Condemn Carcass</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-color-body-3" class="hidden"
                                        aria-labelledby="accordion-color-heading-3">
                                        <div
                                            class="p-1 border border-t-0 border-gray-200 dark:border-gray-700 rounded-b-lg ">
                                            {{-- start table --}}

                                            <div class="relative overflow-x-auto shadow-md sm:rounded-b-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                Organ
                                                            </th>

                                                            <th scope="col" class="px-6 py-3">
                                                                Weight
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Cause
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($animal->condemnCarcasses->isEmpty())
                                                            <tr>
                                                                <td rowspan="1" colspan="6"
                                                                    class="py-4  text-center">
                                                                    <h1 class="font-semibold italic pb-3">No
                                                                        Condemn Carcass</h1>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            @foreach ($animal->condemnCarcasses as $condemn)
                                                                <tr
                                                                    class="{{ $loop->odd ? 'odd:bg-white' : 'even:bg-gray-200' }} capitalize border-b">
                                                                    <form
                                                                        action="{{ route('edit.condemn.parts', ['id' => $condemn->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <th scope="row"
                                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                                            <span
                                                                                id="part_{{ $condemn->id }}">{{ optional($condemn)->part }}</span>
                                                                            <input type="text" name="part"
                                                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                                                id="part_input_{{ $condemn->id }}"
                                                                                value="{{ optional($condemn)->part }}">
                                                                        </th>
                                                                        {{-- <td class="px-6 py-4">
                                                                            <span
                                                                                id="category_{{ $condemn->id }}">{{ optional($condemn)->category }}</span>
                                                                            <input type="text" name="category"
                                                                                id="category_input_{{ $condemn->id }}"
                                                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                                                value="{{ optional($condemn)->category }}">
                                                                        </td> --}}
                                                                        <td class="px-6 py-4">
                                                                            <span
                                                                                id="carcass_weight_{{ $condemn->id }}">{{ optional($condemn)->carcass_weight }}</span>
                                                                            <input type="number" name="condemnWeights"
                                                                                id="carcass_weight_input_{{ $condemn->id }}"
                                                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                                                value="{{ optional($condemn)->carcass_weight }}">
                                                                        </td>
                                                                        <td class="px-6 py-4">
                                                                            <span
                                                                                id="cause_{{ $condemn->id }}">{{ optional($condemn)->cause }}</span>
                                                                            <input type="text" name="cause"
                                                                                id="cause_input_{{ $condemn->id }}"
                                                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                                                value="{{ optional($condemn)->cause }}">
                                                                        </td>
                                                                        <td class="px-6 py-4 space-x-1">
                                                                            <a onclick="editRow({{ $condemn->id }})"
                                                                                class="cursor-pointer  font-medium text-blue-600 hover:underline">
                                                                                <span
                                                                                    id="editSpan_{{ $condemn->id }}">Edit</span>
                                                                                <span id="cancelSpan_{{ $condemn->id }}"
                                                                                    class="hidden">Cancel</span>
                                                                            </a>

                                                                            <button id="button_{{ $condemn->id }}"
                                                                                type="submit"
                                                                                class="cursor-pointer hidden  font-medium text-green-600 hover:underline">
                                                                                Save
                                                                            </button>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                            {{-- end table --}}

                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endif
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-4 rounded-b dark:border-gray-600">
                            {{-- <button type="submit"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-700 dark:hover:bg-primary-800 dark:focus:ring-primary-800">
                                Apply
                            </button>
                            <button type="button"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Reset
                            </button> --}}
                            @if ($animal->status === 'inspection')
                                @csrf
                                @if (optional($animal->anteMortem)->inspection_status === null)
                                    <div class="flex">
                                        <div class="flex  m-5">
                                            <button data-modal-target="schedule-modal" data-modal-toggle="schedule-modal"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                For Slaughter
                                            </button>
                                        </div>

                                        <div class="flex  m-5">
                                            <button id="adminDisposeBtn" data-modal-target="admin-dispose"
                                                data-modal-toggle="admin-dispose"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                type="button">
                                                Dispose Animal
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if ($animal->butcher === 'private' && $animal->status === 'for slaughter')
                                <div class="flex justify-center m-5">
                                    <button data-modal-target="privateButcher-modal"
                                        data-modal-toggle="privateButcher-modal"
                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Slaughter
                                    </button>
                                </div>
                            @endif

                            @if ($animal->status === 'pending')
                                @csrf
                                <button data-modal-target="approve-modal" data-modal-toggle="approve-modal"
                                    class=" flex items-center gap-1 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" data-slot="icon" class="w-6 h-6">
                                        <path
                                            d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                    </svg>

                                    Approve
                                </button>
                                <button data-modal-target="reject-modal" data-modal-toggle="reject-modal"
                                    class=" flex items-center gap-1 text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" class="w-6 h-6">
                                        <path
                                            d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                                    </svg>
                                    Reject
                                </button>
                            @elseif($animal->status === 'inspection')
                                <form action="{{ route('for.slaughter.animal', ['id' => $animal->id]) }}" method="post">
                                    @csrf
                                </form>
                            @endif
                            @if (optional($animal->anteMortem)->inspection_status === 'for slaughter')
                                @if ($animal->status !== 'slaughtered' && $animal->status !== 'completed')
                                    <button data-modal-target="schedule-modal" data-modal-toggle="schedule-modal"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        Reschedule
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>


            </section> <!-- Main modal -->
            @include('admin.formhandler.form-popup')

        </div>
        <div id="print-view-modal" tabindex="-1"
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
                            data-modal-hide="print-view-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
    @endsection

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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
        let activeRowId = null;

        function editRow(id) {
            if (activeRowId !== null && activeRowId !== id) {
                // If another row is active, cancel editing for that row
                cancelEditing(activeRowId);
            }

            // Toggle visibility of text and input elements
            toggleEditing(id);

            // Update the active row ID
            activeRowId = (activeRowId === id) ? null : id;
        }

        function cancelEditing(id) {
            // Close the currently active row
            toggleEditing(id);
        }

        function toggleEditing(id) {
            // Toggle visibility of text and input elements
            document.getElementById(`part_${id}`).classList.toggle('hidden');
            document.getElementById(`part_input_${id}`).classList.toggle('hidden');

            document.getElementById(`category_${id}`).classList.toggle('hidden');
            document.getElementById(`category_input_${id}`).classList.toggle('hidden');

            document.getElementById(`carcass_weight_${id}`).classList.toggle('hidden');
            document.getElementById(`carcass_weight_input_${id}`).classList.toggle('hidden');

            document.getElementById(`cause_${id}`).classList.toggle('hidden');
            document.getElementById(`cause_input_${id}`).classList.toggle('hidden');

            document.getElementById(`button_${id}`).classList.toggle('hidden');

            const editSpan = document.getElementById(`editSpan_${id}`);
            const cancelSpan = document.getElementById(`cancelSpan_${id}`);

            if (editSpan && cancelSpan) {
                if (editSpan.classList.contains('hidden')) {
                    // "Cancel" is currently displayed, switch to "Edit"
                    editSpan.classList.remove('hidden');
                    cancelSpan.classList.add('hidden');
                } else {
                    // "Edit" is currently displayed, switch to "Cancel"
                    editSpan.classList.add('hidden');
                    cancelSpan.classList.remove('hidden');
                }
            }
        }
    </script>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
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
