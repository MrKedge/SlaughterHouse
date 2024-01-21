<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Scheduled Queue'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col w-full">

            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}

                <div class="text-2xl font-bold py-3">@include('admin.layout.admin-calendar')</div>
                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                    <table class="w-full text-center text-base capitalize font-medium text-gray-500 ">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            Scheduled Queue
                            <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                {{ $selectedDate }}</p>
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
                                    Owner
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Scheduled Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Scheduled Time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Butcher
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
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        @include('admin.layout.animals-popover')

                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ optional($animals->schedule)->scheduled_at ? \Carbon\Carbon::parse($animals->schedule->scheduled_at)->format('M d Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ optional($animals->schedule)->scheduled_at ? \Carbon\Carbon::parse($animals->schedule->scheduled_at)->format('h:i A') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($animals->butcher === 'private')
                                            <span
                                                class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-1 rounded">
                                                {{ $animals->butcher }}
                                            </span>
                                        @else
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-1 rounded">
                                                {{ $animals->butcher }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-[#38419D]">
                                        <div class="flex justify-center gap-3">

                                            <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
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
                                <td colspan="7" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No schedules are set for this date.</h1>
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

</body>

</html>
