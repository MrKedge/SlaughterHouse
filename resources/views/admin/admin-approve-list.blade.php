<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Approved List'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col w-full">


            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3 ">
                {{-- wrapper --}}
                <div class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md ">
                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
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
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
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
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
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
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
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
                            Approved Animal
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
                                            href="{{ route('admin.approve.list', [
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
                                            href="{{ route('admin.approve.list', [
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
                                        Approved Date
                                        <a
                                            href="{{ route('admin.approve.list', [
                                                'sort_column' => 'approved_at',
                                                'sort_order' => $sortColumn == 'approved_at' && $sortOrder == 'asc' ? 'desc' : 'asc',
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
                                        Approved Time
                                        <a
                                            href="{{ route('admin.approve.list', [
                                                'sort_column' => 'approved_at',
                                                'sort_order' => $sortColumn == 'approved_at' && $sortOrder == 'asc' ? 'desc' : 'asc',
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
                                        {{ \Carbon\Carbon::parse($animals->approved_at)->format('M d Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animals->approved_at)->format('h:i A') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                            {{ $animals->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <div class="flex justify-center gap-3 text-[#38419D]">
                                            @if ($animals->qr_code !== null)
                                                <button data-modal-target="print-qr-modal{{ $animals->id }}"
                                                    data-modal-toggle="print-qr-modal{{ $animals->id }}" type="button"
                                                    data-tooltip-target="tooltip-printQr{{ $animals->id }}"
                                                    data-tooltip-style="light"
                                                    class="font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                </button>
                                                <div id="tooltip-printQr{{ $animals->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                    Print Qr
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            @endif
                                            @if ($animals->qr_code === null)
                                                <form action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        data-tooltip-target="tooltip-generateQr{{ $animals->id }}"
                                                        data-tooltip-style="light"
                                                        class="font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                                                        </svg>
                                                    </button>
                                                    <div id="tooltip-generateQr{{ $animals->id }}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                        Generate Qr
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </form>
                                            @endif
                                            {{-- arrival btn  --}}
                                            @if ($animals->status === 'approved' && !($animals->anteMortem && $animals->anteMortem->arrived_at !== null))
                                                @include('admin.layout.pop-up', [
                                                    'animalId' => $animals->id,
                                                ])
                                                <button data-modal-target="crud-modal{{ $animals->id }}"
                                                    data-modal-toggle="crud-modal{{ $animals->id }}"
                                                    data-tooltip-target="tooltip-arrival{{ $animals->id }}"
                                                    data-tooltip-style="light"
                                                    class="font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 "
                                                    type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <div id="tooltip-arrival{{ $animals->id }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                    Record arrival date
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            @endif
                                            @if ($animals->anteMortem && $animals->anteMortem->arrived_at !== null && $animals->qr_code !== null)
                                                @include('admin.layout.pop-up', [
                                                    'animalId' => $animals->id,
                                                ])
                                                <button data-modal-target="monitor-modal{{ $animals->id }}"
                                                    data-modal-toggle="monitor-modal{{ $animals->id }}" type="button"
                                                    class="{{ optional($animals->stub)->issued_at === null ? 'cursor-not-allowed' : '' }}  font-medium py-1 px-3 rounded-lg flex items-center text-sm transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110"
                                                    @if (optional($animals->stub)->issued_at === null) disabled data-tooltip-target="tooltip-light-{{ $animals->id }}" data-tooltip-style="light" @endif>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                </button>
                                                @include('admin.layout.tooltip', [
                                                    'tooltipId' => 'tooltip-light-' . $animals->id,
                                                    'tooltipContent' => 'Issue Stub First',
                                                    'tooltipStyle' => 'light',
                                                ])
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
                                    <h1 class="font-semibold italic pb-3">No Approved Animal</h1>
                                </td>
                            </tr>
                        @endforelse

                    </table>
                    <div class="flex p-4 bg-white text-[#37B5B6]">
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
    <script>
        function printPage() {
            // Add opacity-0 class to hide other buttons
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.add('opacity-0');
            });

            // Toggle opacity and apply backdrop styles to the elements with class 'hide-on-print' before printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.add('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Trigger the print function
            window.print();

            // Remove the applied styles and show other buttons after printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.remove('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Remove opacity-0 class to show other buttons after printing
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.remove('opacity-0');
            });
        }
    </script>
</body>

</html>
