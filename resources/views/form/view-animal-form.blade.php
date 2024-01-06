<div class="mx-auto w-full">

    {{-- main content --}}

    <div class="flex">


        <section class=" h-full w-full rounded-md mx-3 mt-2 drop-shadow-2xl bg-gray-50">

            <div class=" border-b border-gray-300 bg-white">
                <h1 class="mt-3  text-2xl font-bold text-left pl-6 pb-6 text-[#293241] ">
                    ANIMAL
                    DETAILS</h1>
                <h1 class="pl-6 text-2xl font-medium text-[#293241]">
                    ID:<span> {{ $animal->id }}</span></h1>
                <h1 class="pl-6 pb-3 text-2xl font-medium text-[#293241]">
                    Status: @include('form.form-status')
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
                    @if (auth()->user()->role === 'admin')
                        <h1 class="font-bold pointer-events-none text-lg italic pl-12 ">Documents:
                        </h1>
                        <!-- Modal body -->
                        <div class="grid gap-4 mb-4 sm:grid-cols-5 px-12 bg-gray-50">

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
                                @if ($animal->cert_transfer !== null)
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
                    @endif

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
                                                <p id="address"
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
                                        class="p-1 border border-t-0 border-gray-200 dark:border-gray-700 rounded-b-lg">
                                        {{-- start table --}}

                                        <div class="relative overflow-x-auto shadow-md sm:rounded-b-lg">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Organ
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Category
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
                                                                    <td class="px-6 py-4">
                                                                        <span
                                                                            id="category_{{ $condemn->id }}">{{ optional($condemn)->category }}</span>
                                                                        <input type="text" name="category"
                                                                            id="category_input_{{ $condemn->id }}"
                                                                            class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                                            value="{{ optional($condemn)->category }}">
                                                                    </td>
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

                            <div class="flex">
                                <div class="flex  m-5">
                                    <button data-modal-target="inspector-schedule-modal"
                                        data-modal-toggle="inspector-schedule-modal"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        For Slaughter
                                    </button>
                                </div>
                                <div class="flex  m-5">
                                    <button id="updateProductButton" data-modal-target="inspector-dispose"
                                        data-modal-toggle="inspector-dispose"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        type="button">
                                        Dispose Animal
                                    </button>
                                </div>
                            </div>
                        @endif
                        @if ($animal->status === 'for slaughter')
                            <button data-modal-target="slaughter-modal" data-modal-toggle="slaughter-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Slaughter
                            </button>
                        @endif
                        @if ($animal->status === 'slaughtered' && auth()->user()->role === 'inspector')
                            <div class="flex justify-center m-5">
                                <button id="defaultModalButton" data-modal-target="defaultModal"
                                    data-modal-toggle="defaultModal"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    type="button">
                                    For Consumption
                                </button>
                            </div>


                            <div class="flex justify-center m-5">
                                <button id="condemnModalButton" data-modal-target="condemnModal"
                                    data-modal-toggle="condemnModal"
                                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                                    type="button">
                                    Condemn
                                </button>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </section>
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

@include('form.pop-up')
{{-- @include('admin.layout.admin-form-sideviews') --}}
