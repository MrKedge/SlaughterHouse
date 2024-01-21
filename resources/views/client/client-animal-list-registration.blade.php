<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Animal List'])
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<body class="bg-[#f6f8fa] scrollbar-gutter">




    @extends('client.layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full ">


            <div class="mx-auto w-full px-4 mt-20">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}

                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300">
                    <table
                        class="scrollbar-gutter whitespace-nowrap  w-full text-sm text-center capitalize font-medium text-gray-500 ">
                        <caption class=" text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            <caption
                                class="p-3 space-y-3 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                                <h1>Registration List <span
                                        class="mt-1 block text-sm font-semibold uppercase text-gray-500">as
                                        of
                                        {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</span></h1>
                                <div class="flex w-full">
                                    <label for="search-dropdown"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your
                                        Email</label>
                                    <button id="filter-button" data-dropdown-toggle="filter"
                                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                                        type="button">All categories
                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <div id="filter"
                                        class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-2xl w-44">
                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="filter-button">
                                            <li>
                                                <a href="{{ route('client.animal.list.register') }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">All
                                                    categories</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'pending']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Pending</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'approved']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Approved</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'inspection']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Inspection</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'rejected']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Rejected</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'slaughtered']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Slaughtered</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'for slaughter']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">For
                                                    Slaughter</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('client.animal.list.register', ['status' => 'processed']) }}"
                                                    class="filter-btn inline-flex w-full px-4 py-2 hover:bg-gray-100">Processed</a>
                                            </li>

                                            <!-- Add more li elements for other categories -->
                                        </ul>
                                    </div>
                                    <div class="relative">
                                        <input type="search" id="search-dropdown"
                                            class="block p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
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
                            </caption>

                        </caption>
                        <thead class="text-xs text-white uppercase bg-[#37B5B6]">

                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Time
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
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $animals->type }}
                                        <!-- Popover -->

                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animals->created_at)->format('M d Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animals->created_at)->format('h:i a') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($animals->status === 'approved')
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @elseif($animals->status === 'pending')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @elseif($animals->status === 'inspection')
                                            <span
                                                class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @elseif($animals->status === 'rejected')
                                            <span
                                                class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @elseif($animals->status === 'for slaughter')
                                            <span
                                                class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @elseif($animals->status === 'slaughtered')
                                            <span
                                                class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-3 text-[#38419D]">
                                            @if ($animals->status === 'rejected')
                                                <a href="{{ route('client.edit.animal.form', ['id' => $animals->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
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
                                <td colspan="6" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No {{ $status }} Animal</h1>
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
            </div>



        </div>
    @endsection
    {{-- <script>
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
    </script> --}}
</body>

</html>
