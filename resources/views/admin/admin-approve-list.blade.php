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

                        <div class="flex justify-between ">

                            @include('admin.tabs.tabs')
                            @include('admin.tabs.search-bar')
                        </div>
                        <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                            <table id="example" class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th data-priority="1"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Id
                                        </th>
                                        <th data-priority="2"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th data-priority="3"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                        </th>
                                        <th data-priority="4"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Approved Date
                                        </th>
                                        <th data-priority="5"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Approved Time
                                        </th>
                                        <th data-priority="6"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Status
                                        </th>
                                        <th data-priority="7"
                                            class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
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
                                                <td class=" border-b border-black capitalize font-medium">
                                                    {{ $animals->id }}
                                                </td>
                                                <td class="border-b border-black capitalize font-normal">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class=" border-b border-black uppercase font-semibold relative">
                                                    <p data-popover-target="popover-{{ $loop->index }}"
                                                        class="font-medium rounded-lg text-sm py-2.5 text-center">
                                                        {{ $animals->type }}
                                                    </p>

                                                    <!-- Popover -->
                                                    <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                                        <div
                                                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                                            <h3 class="font-semibold text-gray-900">{{ $animals->type }}
                                                            </h3>
                                                        </div>
                                                        <div class="z-40 px-3 py-2">
                                                            <p>{{ $animals->gender }}</p>
                                                            <p>{{ $animals->live_weight }} Kg.</p>
                                                            <p>{{ $animals->age }} Mos.</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                                <td class=" border-b border-black capitalize font-normal">
                                                    {{ \Carbon\Carbon::parse($animals->approved_at)->format('M d Y') }}
                                                </td>
                                                <td class=" font-normal  border-b border-black capitalize ">
                                                    {{ \Carbon\Carbon::parse($animals->approved_at)->format('h:i:s A') }}
                                                </td>
                                                <td class=" border-b border-black font-semibold capitalize">
                                                    <span
                                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animals->status }}
                                                    </span>

                                                </td>
                                                <td class="border-b border-black font-semibold capitalize py-4">
                                                    <div class="flex justify-center gap-3">
                                                        @if ($animals->qr_code !== null)
                                                            <form
                                                                action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="  text-white font-medium py-1 px-3 rounded-lg flex items-center text-sm">
                                                                    <i
                                                                        class='bx bx-printer text-[24px] text-gray-900 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if ($animals->qr_code === null)
                                                            <form
                                                                action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="  text-white font-medium py-1 px-3 rounded-lg flex items-center text-sm">
                                                                    <i
                                                                        class='bx bx-qr-scan text-[24px] text-gray-900 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        {{-- @if  --}}
                                                        @if ($animals->status === 'approved' && !($animals->anteMortem && $animals->anteMortem->arrived_at !== null))
                                                            @include('admin.layout.pop-up', [
                                                                'animalId' => $animals->id,
                                                            ])
                                                            <button data-modal-target="crud-modal{{ $animals->id }}"
                                                                data-modal-toggle="crud-modal{{ $animals->id }}"
                                                                class=" text-gray-900 font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 "
                                                                type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </button>
                                                        @endif
                                                        @if ($animals->anteMortem && $animals->anteMortem->arrived_at !== null && $animals->qr_code !== null)
                                                            @include('admin.layout.pop-up', [
                                                                'animalId' => $animals->id,
                                                            ])
                                                            <button
                                                                data-modal-target="monitor-modal{{ $animals->id }}"
                                                                data-modal-toggle="monitor-modal{{ $animals->id }}"
                                                                type="button"
                                                                class=" text-gray-900 font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" data-slot="icon"
                                                                    class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                                </svg>



                                                            </button>
                                                        @endif
                                                        <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                            class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                data-slot="icon" class="w-6 h-6">
                                                                <path
                                                                    d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                            </svg>

                                                            <span>View</span>
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
    </div>
    {{-- @foreach ($animal as $animals)
            <nav id="schedule-nav{{ $animals->id }}"
                class="bg-white absolute h-auto px-6 pb-6 rounded-md hidden text-[#293241] top-1/3  right-1/3 ">


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
        </script> --}}

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>

</body>

</html>
