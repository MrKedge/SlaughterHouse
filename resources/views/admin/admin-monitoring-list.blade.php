<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Antemortem List'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col w-full">



            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>

                        <span class="font-bold text-4xl">{{ $animal->where('type', 'cow')->count() }}</span>
                    </div>

                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">HORSE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'horse')->count() }}</span>
                    </div>
                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">CARABAO</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'carabao')->count() }}</span>
                    </div>
                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">SWINE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>



                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>


            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}

                <div class="text-2xl font-bold py-3"> @include('admin.tabs.tabs')</div>
                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                    <table class="w-full text-center text-base capitalize font-medium text-gray-500 ">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            Ante Mortem
                            <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
                        </caption>
                        <thead class="text-xs text-white uppercase bg-[#37B5B6]">

                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center justify-center">
                                        Animal
                                        <a
                                            href="{{ route('admin.monitor.list', [
                                                'sort_column' => 'type',
                                                'sort_order' => $sortColumn == 'type' && $sortOrder == 'asc' ? 'desc' : 'asc',
                                            ]) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center justify-center">
                                        Owner
                                        <a
                                            href="{{ route('admin.monitor.list', [
                                                'sort_column' => 'users.first_name',
                                                'sort_order' => $sortColumn == 'users.first_name' && $sortOrder == 'asc' ? 'desc' : 'asc',
                                            ]) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center justify-center">
                                        Arrived Date
                                        <a
                                            href="{{ route('admin.monitor.list', [
                                                'sort_column' => 'arrived_at',
                                                'sort_order' => $sortColumn == 'arrived_at' && $sortOrder == 'asc' ? 'desc' : 'asc',
                                            ]) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center justify-center">
                                        Arrived Time
                                        <a
                                            href="{{ route('admin.monitor.list', [
                                                'sort_column' => 'arrived_at',
                                                'sort_order' => $sortColumn == 'arrived_at' && $sortOrder == 'asc' ? 'desc' : 'asc',
                                            ]) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg>
                                        </a>
                                    </div>
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
                                        {{ optional($animals->anteMortem)->arrived_at ? \Carbon\Carbon::parse($animals->anteMortem->arrived_at)->format('M d Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ optional($animals->anteMortem)->arrived_at ? \Carbon\Carbon::parse($animals->anteMortem->arrived_at)->format('h:i A') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                            {{ $animals->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-[#38419D]">
                                        <div class="flex justify-center gap-3">
                                            @if ($animals->qr_code === null)
                                                <form action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btnForSchedNav bg-[#293241] hover:bg-gray-800 text-white font-bold py-1 px-1 rounded flex items-center">
                                                        <i class='bx bx-qr' style='color: #ffffff; font-size: 28px;'></i>
                                                    </button>
                                                </form>
                                            @endif
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
                                    <h1 class="font-semibold italic pb-3">No Animal</h1>
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

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
