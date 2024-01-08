<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Animal List'])
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<body class="bg-[#D5DFE8] overflow-hidden">




    @extends('client.layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full ">

            <section class="flex justify-start gap-20 pl-6  py-3 overflow-x-auto w-full h-auto pr-6 pb-6">
                {{-- wrapper --}}
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'pending')->count() }}</div>

                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='check-double'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'approved')->count() }}</div>
                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUGHTERED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'slaughtered')->count() }}</div>
                </div>
            </section>


            <div class="mx-auto w-full">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section
                    class=" mx-5 w-auto h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                    <div>
                        <h1 class="text-2xl font-bold py-3 text-[#293241]">Register List</h1>

                        <form>
                            <div class="flex pb-4 max-w-xl">
                                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your
                                    Email</label>
                                <button id="filter-button" data-dropdown-toggle="filter"
                                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                                    type="button">All categories
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="filter"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-2xl w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="filter-button">
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="all">All categories</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="pending">Pending</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="approved">Approved</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="inspection">Inspection</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="rejected">Rejected</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100"
                                                data-status="slaughtered">Slaughtered</button>
                                        </li>
                                        <!-- Add more li elements for other categories -->

                                    </ul>
                                </div>
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown"
                                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                        placeholder="Search..." required>
                                    <button type="submit"
                                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[375px]">
                        <table class="w-full text-center" id="animalTableBody">
                            <thead>
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">No.</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Time
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @php $index = 1; @endphp

                                @if ($animals->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-4 border-b border-black text-center">
                                            <h1 class="font-bold italic pb-3">No Animals</h1>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($animals as $animal)
                                        <tr
                                            class="animal-row {{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200 {{ strtolower($animal->status) }}">
                                            <td class=" border-b border-black">{{ $index }}</td>

                                            <td class=" border-b border-black uppercase font-semibold">
                                                {{ $animal->type }}
                                            </td>
                                            <td class=" border-b border-black">
                                                {{ \Carbon\Carbon::parse($animal->created_at)->format('M d Y') }}
                                            </td>
                                            <td class=" border-b border-black">
                                                {{ \Carbon\Carbon::parse($animal->created_at)->format('h:i A') }}
                                            </td>
                                            <td class=" py-4 border-b border-black capitalize font-medium">
                                                @if ($animal->status === 'approved')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @elseif($animal->status === 'pending')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @elseif($animal->status === 'inspection')
                                                    <span
                                                        class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @elseif($animal->status === 'rejected')
                                                    <span
                                                        class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @elseif($animal->status === 'for slaughter')
                                                    <span
                                                        class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @elseif($animal->status === 'slaughtered')
                                                    <span
                                                        class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animal->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                <div class="flex justify-center whitespace-nowrap">
                                                    @if ($animal->status === 'rejected' || $animal->status === 'pending')
                                                        <a
                                                            href="{{ route('client.edit.animal.form', ['id' => $animal->id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('client.view.animal.form', ['id' => $animal->id]) }}"
                                                        class="  text-gray-900 font-semibold px-3 rounded-lg flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" data-slot="icon" class="w-6 h-6">
                                                            <path
                                                                d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                        </svg>

                                                        <span></span>
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
    @endsection


    <script>
        $(document).ready(function() {
            $('.filter-btn').click(function() {
                var selectedStatus = $(this).data('status').toLowerCase();

                // Show or hide rows based on the selected status
                if (selectedStatus === 'all') {
                    $('.animal-row').show(); // Show all rows with the 'animal-row' class
                } else {
                    $('.animal-row').hide(); // Hide all rows with the 'animal-row' class
                    $('.animal-row.' + selectedStatus).show(); // Show rows with the selected status
                }
            });
        });
    </script>
</body>

</html>
