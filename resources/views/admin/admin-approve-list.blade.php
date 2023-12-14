<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Approved List'])

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
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

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
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                </section>


                <div class="mx-auto w-full px-4">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section
                        class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                        <div class="flex">
                            <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">
                                Approved Animals
                            </h1>
                            <div class="">
                                <label for=""></label>
                                {{-- <input type="checkbox"> --}}
                            </div>
                        </div>
                        <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                            <table class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Id
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Approved Date
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Approved Time
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Status
                                        </th>
                                        <th class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @if ($animal->isEmpty())
                                        <tr>
                                            <td rowspan="6" colspan="6"
                                                class="h-[500px] py-4 border-b border-black text-center">
                                                <h1 class="font-semibold italic pb-3">No Approve
                                                    Animal
                                                </h1>
                                            </td>
                                        </tr>
                                    @else
                                        @php $index = 1 @endphp
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200  ">
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $animals->id }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold relative">

                                                    <p data-popover-target="popover-{{ $loop->index }}"
                                                        class=" font-bold rounded-lg text-sm px-5 py-2.5 text-center   ">
                                                        {{ $animals->type }}
                                                    </p>

                                                    <!-- Popover -->
                                                    <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div
                                                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                                                {{ $animals->type }}</h3>
                                                        </div>
                                                        <div class="z-40 px-3 py-2">
                                                            <p>{{ $animals->gender }}</p>
                                                            <p>{{ $animals->live_weight }} Kg.</p>
                                                            <p>{{ $animals->age }} Mos.</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                                <td class="py-4 font-medium  border-b border-black capitalize ">
                                                    {{ \Carbon\Carbon::parse($animals->approved_at)->format('M d Y') }}
                                                </td>
                                                <td class="py-4 font-medium  border-b border-black capitalize ">
                                                    {{ \Carbon\Carbon::parse($animals->approved_at)->format('h:i:s A') }}
                                                </td>
                                                <td class="py-4 border-b border-black font-semibold capitalize">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300 uppercase">{{ $animals->status }}</span>

                                                </td>
                                                <td class=" border-b border-black font-semibold capitalize">

                                                    <div class="flex justify-center gap-3">
                                                        @if ($animals->qr_code !== null)
                                                            <form
                                                                action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btnForSchedNav bg-[#293241] hover:bg-gray-800 text-white font-bold py-2 px-2 rounded flex items-center">
                                                                    <i class='bx bx-printer text-[28px] '></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if ($animals->qr_code === null)
                                                            <form
                                                                action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btnForSchedNav text-[] font-bold py-2 px-2 rounded flex items-center">
                                                                    <i class='bx bx-qr'
                                                                        style='color: #293241; font-size: 28px;'></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        {{-- @if  --}}
                                                        @if ($animals->status === 'approved' && !($animals->anteMortem && $animals->anteMortem->arrived_at !== null))
                                                            <a data-animal-id="{{ $animals->id }}"
                                                                class="btnForSchedNav bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                                <i class='bx bx-timer'
                                                                    style='color:#ffffff; font-size: 24px;'></i>
                                                            </a>
                                                        @endif
                                                        @if ($animals->anteMortem && $animals->anteMortem->arrived_at !== null && $animals->qr_code !== null)
                                                            <form
                                                                action="{{ route('admin.monitor.animal', ['id' => $animals->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                                    <i
                                                                        class='bx bx-target-lock'></i><span>Monitor</span>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                            <box-icon name='navigation'
                                                                color='#ffffff'></box-icon><span>View</span>
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            @php $index++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            {{-- End wrapper --}}
        </div>

        @foreach ($animal as $animals)
            <nav id="schedule-nav{{ $animals->id }}"
                class="bg-white absolute h-auto px-6 pb-6 rounded-md hidden text-[#293241] top-1/3  right-1/3 ">

                <form action="{{ route('set.arrival', ['id' => $animals->id]) }}" method="post" class="space-y-4">
                    @csrf
                    <h1 class="font-bold text-xl mb-3 text-center"></h1>
                    <div class="pb-3">
                        <label class="font-bold text-xl">Time of Arrival</label>
                        <div class="text-center pt-1">

                            <input name="dateOfArrival" required type="date"
                                class="p-2 border-2 font-semibold border-gray-800 rounded"
                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            <input name="timeOfArrival" required type="time"
                                class="p-2 border-2 font-semibold border-gray-800 rounded"
                                value="{{ \Carbon\Carbon::now()->format('H:i') }}">
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit"
                            class="py-2 w-full bg-gray-700 hover:bg-gray-800 text-white font-bold rounded text-center">SET</button>
                        <a
                            class="hideSchedNav py-2 w-full bg-gray-700 hover:bg-gray-800 text-white font-bold rounded text-center">Back</a>
                    </div>
                </form>
            </nav>
        @endforeach

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var showNavBtns = document.querySelectorAll(".btnForSchedNav");
                var scheduleNavs = document.querySelectorAll("[id^='schedule-nav']");
                var hideNavBtns = document.querySelectorAll(".hideSchedNav");
                var blurringDiv = document.getElementById("blurring");

                hideNavBtns.forEach(function(hideBtn) {
                    hideBtn.addEventListener("click", function() {
                        // Hide all schedule navigations
                        scheduleNavs.forEach(function(nav) {
                            nav.classList.add("hidden");
                        });

                        // Hide the blurring div
                        blurringDiv.classList.add("hidden");
                    });
                });

                showNavBtns.forEach(function(btn) {
                    btn.addEventListener("click", function() {
                        var animalId = btn.getAttribute("data-animal-id");

                        // Hide all schedule navigations
                        scheduleNavs.forEach(function(nav) {
                            nav.classList.add("hidden");
                        });

                        // Show the clicked schedule navigation
                        var scheduleNav = document.getElementById("schedule-nav" + animalId);
                        scheduleNav.classList.remove("hidden");

                        // Show the blurring div
                        blurringDiv.classList.remove("hidden");
                    });
                });
            });
        </script>

        <script src="{{ asset('js/slaughterhouse.js') }}"></script>

</body>

</html>
