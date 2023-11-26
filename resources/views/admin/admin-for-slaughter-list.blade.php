<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>For Slaughter</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="w-full px-6">
                <section
                    class=" ml-[240px] bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                    <div class="flex">
                        <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">For Slaughter
                        </h1>
                        <div class="">
                            <label for=""></label>
                            {{-- <input type="checkbox"> --}}
                        </div>
                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[500px]">
                        <table class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">


                                @php $index = 1 @endphp
                                @foreach ($animal as $animals)
                                    <tr
                                        class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                        <td class="py-4 border-b border-black capitalize font-semibold">
                                            {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                        </td>
                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                            {{ $animals->type }}
                                        </td>
                                        <td class="py-4 border-b border-black font-semibold capitalize">
                                            <div class="flex justify-center gap-3">
                                                <a data-animal-id="{{ $animals->id }}"
                                                    class="btnForSchedNav bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                    <i class='bx bx-timer' style='color:#ffffff; font-size: 24px;'></i>
                                                </a>
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

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>




            {{-- End wrapper --}}
        </div>

        @foreach ($animal as $animals)
            <nav id="schedule-nav{{ $animals->id }}"
                class="bg-white absolute h-auto p-8 pb- rounded-md hidden text-[#293241] top-1/3  right-1/3 ">

                <form action="{{ route('set.schedule', ['id' => $animals->id]) }}" method="post" class="space-y-4">
                    @csrf
                    <div class="pb-3">
                        <label class="font-bold text-xl">Time of Arrival</label>
                        <div class="text-center pt-1">
                            <input name="dateOfArrival" required type="date"
                                class="p-2 border-2 font-semibold border-gray-800 rounded">
                            <input name="timeOfArrival" required type="time"
                                class="p-2 border-2 font-semibold border-gray-800 rounded">
                        </div>
                    </div>
                    <div class="">
                        <label class="font-bold text-xl">Time of Slaughter</label>
                        <div class="text-center pt-1">
                            <input name="dateOfSlaughter" required type="date"
                                class="p-2 border-2 font-semibold border-gray-800 rounded">
                            <input name="timeOfSlaughter" required type="time"
                                class="p-2 border-2 font-semibold border-gray-800 rounded">
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
