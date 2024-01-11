<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'For slaughter List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')

        <div class="flex flex-col w-full">


            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                {{-- wrapper --}}
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
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
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
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
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
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
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>



                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>


            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section
                    class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border-white border-2 p-4">

                    <div class="flex">


                        {{-- <input type="checkbox"> --}}
                        @include('admin.tabs.tabs')

                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                        <table class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        No.
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Scheduled date
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Scheduled time
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">Butcher
                                    </th>
                                    <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php $index = 1 @endphp

                                @if ($animal->isEmpty())
                                    <tr class="h-[440px]">
                                        <td colspan="6" class="py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">No for slaughter Animal</h1>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($animal as $animals)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200">
                                            <td class="border-b border-black capitalize font-semibold">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class=" border-b border-black capitalize font-semibold">
                                                {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                            </td>
                                            <td class="border-b border-black uppercase font-semibold relative">
                                                <p data-popover-target="popover-{{ $loop->index }}"
                                                    class="font-medium rounded-lg text-sm py-2.5 text-center">
                                                    {{ $animals->type }}
                                                </p>

                                                <!-- Popover -->
                                                <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-2xl opacity-0">
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
                                            <td class=" border-b border-black font-semibold capitalize">

                                                {{ optional($animals->schedule)->scheduled_at ? \Carbon\Carbon::parse($animals->schedule->scheduled_at)->format('M d Y') : 'N/A' }}
                                            </td>
                                            <td class=" border-b border-black font-semibold capitalize">

                                                {{ optional($animals->schedule)->scheduled_at ? \Carbon\Carbon::parse($animals->schedule->scheduled_at)->format('h:i a') : 'N/A' }}
                                            </td>
                                            <td class=" border-b border-black uppercase font-semibold">
                                                {{ $animals->butcher }}
                                            </td>
                                            <td class=" py-4 border-b border-black font-semibold capitalize">
                                                <div class="flex justify-center gap-3">
                                                    {{-- <a data-animal-id="{{ $animals->id }}"
                                                    class="btnForSchedNav bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                    <i class='bx bx-timer'
                                                        style='color:#ffffff; font-size: 24px;'></i>
                                                </a> --}}
                                                    <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                        class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
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
</body>

</html>
