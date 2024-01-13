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
                    <table class="scrollbar-gutter w-full text-sm text-center capitalize font-medium text-gray-500 ">
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
                        <thead class="text-xs text-white uppercase bg-slate-600">

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
                                                {{ $animal->status }}
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
                                        <div class="flex justify-center gap-3">
                                            @if ($animals->status === 'rejected' || $animals->status === 'pending')
                                                <a href="{{ route('client.edit.animal.form', ['id' => $animals->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                class="  text-gray-600 font-semibold py-1 px-3 rounded-lg flex items-center text-sm hover:-translate-y-1 transition ease-in-out delay-150 duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>

                                                <span></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No Animal</h1>
                                </td>
                            </tr>
                        @endforelse

                    </table>
                    <div class="flex p-4 bg-slate-200">
                        <!-- Previous Button -->
                        <a href="{{ $animal->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </a>
                        <a href="{{ $animal->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            Next
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
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
