<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Disposal'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('layout.masterlayout')

    @section('content')


        <div class="flex flex-col w-full ">


            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4">
                {{-- wrapper --}}
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>



                        <span class="font-bold text-4xl">{{ $animal->where('type', 'cow')->count() }}</span>
                    </div>

                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">HORSE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                        <span class="text-4xl font-bold">{{ $animal->where('type', 'horse')->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">CARABAO</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'carabao')->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SWINE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>




                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>


            <div class="mx-auto w-full">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section
                    class="z-10 mx-5 w-auto h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                    <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80 ">Disposed Animal</h1>
                    <div class="scrollbar-gutter overflow-y-auto h-[440px]">
                        <table class="w-full text-center">
                            <thead>
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Id
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Status
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Cause
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Date of Disposal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Weight
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @php
                                    $index = 1;

                                @endphp
                                @if ($animal->isEmpty())
                                    <tr>
                                        <td colspan="8" class="py-4 border-b border-black text-center h-[405px]">
                                            <h1 class="font-bold italic pb-3">No dispose Animal</h1>

                                        </td>
                                    </tr>
                                @else
                                    @foreach ($animal as $animals)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                            <td class=" border-b border-black uppercase font-semibold">
                                                {{ $animals->id }}
                                            </td>
                                            <td class=" border-b border-black capitalize font-semibold">
                                                {{ $animals->type }}
                                            </td>
                                            <td class=" border-b border-black uppercase font-semibold">
                                                {{ optional($animals->anteMortem)->inspection_status }}
                                            </td>
                                            <td class="border-b border-black capitalize font-semibold">

                                                <p data-popover-target="popover-{{ $loop->index }}"
                                                    class="font-bold rounded-lg text-sm px-5 py-2.5 text-center">
                                                    {{ Str::limit(optional($animals->anteMortem)->causes, 10, '...') }}
                                                </p>
                                                <!-- Popover -->
                                                <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 ">
                                                    <div
                                                        class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg  ">
                                                        <h3 class="font-semibold text-gray-900 ">
                                                            {{ $animals->type }}</h3>
                                                    </div>
                                                    <div class="z-40 px-3 py-2">

                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Cause:</label>
                                                            <p id="address"
                                                                class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                {{ optional($animals->anteMortem)->causes }}

                                                            </p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Remarks:</label>
                                                            <textarea readonly
                                                                class="cursor-not-allowed  font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                rows="3" {{-- You can adjust the number of rows based on your design --}} name="ante_remarks">{{ optional($animals->anteMortem)->ante_remarks }}</textarea>
                                                        </div>

                                                    </div>
                                                    <div data-popper-arrow></div>
                                                </div>
                                            </td>
                                            <td class=" border-b border-black font-semibold capitalize">
                                                {{ optional($animals->anteMortem)->inspected_at }}
                                            </td>
                                            <td class=" border-b border-black font-semibold capitalize">
                                                {{ $animals->live_weight }} Kg.
                                            </td>
                                            <td class="border-b border-black font-semibold capitalize">
                                                {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                            </td>
                                            <td class="border-b border-black font-semibold capitalize py-4">
                                                <div class="flex justify-center gap-3">

                                                    {{-- <form
                                            action="{{ route('for.slaughter.animal', ['id' => $animals->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit"
                                                class="btnForSchedNav bg-[#293241] hover:bg-gray-800 text-white font-bold py-1 px-2 rounded flex items-center">
                                                Dispatch
                                            </button>
                                        </form> --}}

                                                    <a href="{{ route('inspector.view.form', ['id' => $animals->id]) }}"
                                                        class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" data-slot="icon" class="w-6 h-6">
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
        @include('alerts.success')
        @include('alerts.error')
    @endsection
</body>

</html>
