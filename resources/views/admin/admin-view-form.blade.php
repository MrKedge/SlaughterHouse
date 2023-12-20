<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'View Form'])

<body class="bg-[#D5DFE8] ">

    <div class="min-h-screen w-full">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}

        {{-- this is for the table inside --}}
        <div class="flex">

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>
            <div class="mx-auto w-full">

                {{-- main content --}}

                <div class="ml-[240px] flex">


                    <section class="bg-white h-full w-full rounded-md mx-3 mt-2 drop-shadow-2xl">

                        <div class=" border-b border-gray-300">
                            <h1 class="mt-3  text-2xl font-bold text-left pl-6 pb-6 text-[#293241] ">
                                ANIMAL
                                DETAILS</h1>
                            <h1 class="pl-6 text-2xl font-medium text-[#293241]">
                                ID:<span> {{ $animal->id }}</span></h1>
                            <h1 class="pl-6 pb-3 text-2xl font-medium text-[#293241]">
                                Status: @include('admin.formhandler.form-status')
                            </h1>

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
                                    <div class="grid gap-4 mb-4 sm:grid-cols-3 px-12">
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
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Live
                                                Wt. (Kilogram):</label>
                                            <p id="address"
                                                class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                {{ $animal->live_weight }}

                                            </p>
                                        </div>
                                        @if ($animal->type === 'swine')
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Live
                                                    Wt. (Kilogram):</label>
                                                <p id="address"
                                                    class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                    {{ $animal->live_weight }}

                                                </p>
                                            </div>
                                        @endif

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
                                                        data-accordion-target="#accordion-color-body-1"
                                                        aria-expanded="false" aria-controls="accordion-color-body-1">
                                                        <span>Animal Marks</span>
                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5 5 1 1 5" />
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
                                <h1 class="font-bold pointer-events-none text-lg italic pl-12">Documents:
                                </h1>
                                <!-- Modal body -->
                                <div class="grid gap-4 mb-4 sm:grid-cols-5 px-12">

                                    <div>
                                        <label class="block pb-1" for="">Certificate of Ownership:</label>
                                        <section class="w-[100px] p-1 border-dashed border border-black"
                                            data-lightbox="animal-gallery" data-title="Animal Image">
                                            <a href="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                data-lightbox="animal-gallery">
                                                <img class=""
                                                    src="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                    alt="animal image">
                                            </a>
                                        </section>
                                    </div>
                                    <div>
                                        @if ($animal->cert_transfe !== null)
                                            <label class="block pb-1" for="">Cert. of Transfer of Large
                                                Cattle:</label>
                                            <section class="w-[100px] p-1 border-dashed border border-black"
                                                data-lightbox="animal-gallery" data-title="Animal Image">
                                                <a href="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                                                    data-lightbox="animal-gallery">
                                                    <img class=""
                                                        src="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                                                        alt="animal image">
                                                </a>
                                            </section>
                                        @endif
                                    </div>
                                    <div>
                                        <label class="block pb-1" for="">Brgy. Clearance:</label>
                                        <section class="w-[100px] p-1 border-dashed border border-black"
                                            data-lightbox="animal-gallery" data-title="Animal Image">
                                            <a href="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                data-lightbox="animal-gallery">
                                                <img class=""
                                                    src="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                    alt="animal image">
                                            </a>
                                        </section>
                                    </div>


                                </div>

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
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 10 6">
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
                                                            <textarea id="address"
                                                                class="font-medium min-h-[40px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                rows="3" name="ante_remarks">{{ $animal->anteMortem->ante_remarks ?? 'N/A' }}</textarea>
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
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 10 6">
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

                                                        <p id="ownerName"
                                                            class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            {{ $animal->anteMortem->slaughtered_at ?? 'N/A' }}

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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Result:</label>
                                                        <p id="address"
                                                            class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            {{ $animal->postMortem->postmortem_status ?? 'N/A' }}
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
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-color-body-3" class="hidden"
                                            aria-labelledby="accordion-color-heading-3">
                                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                                {{-- start table --}}

                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Organ
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Status
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
                                                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                                    Apple MacBook Pro 17"
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    Silver
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    Laptop
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    $2999
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <a href="#"
                                                                        class="font-medium text-blue-600 hover:underline">Edit</a>
                                                                </td>
                                                            </tr>


                                                            <!-- Repeat similar changes for other rows -->
                                                        </tbody>
                                                    </table>
                                                </div>

                                                {{-- end table --}}

                                            </div>
                                        </div>

                                    </div>

                                </div>
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
                                                    <button data-modal-target="schedule-modal"
                                                        data-modal-toggle="schedule-modal"
                                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        For Slaughter
                                                    </button>
                                                </div>

                                                <div class="flex  m-5">
                                                    <button id="updateProductButton"
                                                        data-modal-target="updateProductModal"
                                                        data-modal-toggle="updateProductModal"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                        type="button">
                                                        Dispose Animal
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif


                                    @if ($animal->status === 'pending')
                                        @csrf
                                        <button data-modal-target="approve-modal" data-modal-toggle="approve-modal"
                                            class=" flex items-center gap-1 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                            type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" data-slot="icon"
                                                class="w-6 h-6">
                                                <path
                                                    d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                            </svg>

                                            Approve
                                        </button>
                                        <a id="show-remarks"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            REJECT
                                        </a>
                                    @elseif($animal->status === 'inspection')
                                        <form action="{{ route('for.slaughter.animal', ['id' => $animal->id]) }}"
                                            method="post">
                                            @csrf
                                        </form>
                                    @endif
                                    @if (optional($animal->anteMortem)->inspection_status === 'for slaughter')
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Reschedule
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Main modal -->
                </div>


                </section>



            </div>
        </div>
    </div>



    </div>
    @include('admin.formhandler.form-popup')
    {{-- @include('admin.layout.admin-form-sideviews') --}}
</body>

</html>
