<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Inspector Overview'])


<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="min-h-screen">{{-- wrapperr --}}

        {{-- header --}}
        <div class="z-50"> @include('inspector.layout.inspector-header')</div>
        {{-- header --}}


        <div class="flex">


            <div class="inline-block z-40"> @include('inspector.layout.inspector-sidepanel')</div>


            {{-- main content --}}


            <div class="flex flex-col w-full ">


                <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4">
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


                <div class="mx-auto w-full">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section
                        class="z-10 mx-5 w-auto h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                        <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80 ">Ante Mortem</h1>
                        <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="">
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Id
                                        </th>
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                        </th>
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Time of Arrival
                                        </th>
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Status
                                        </th>
                                        <th class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @if ($animal->isEmpty())
                                        <tr>
                                            <td colspan="6" class="py-4 border-b border-black text-center h-[400px]">
                                                <h1 class="font-semibold italic pb-3">No Animal to Monitor
                                                </h1>
                                            </td>
                                        </tr>
                                    @else
                                        @php $index = 1 @endphp
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200">
                                                <td class=" border-b border-black capitalize font-semibold">
                                                    {{ $animals->id }}
                                                </td>
                                                <td class=" border-b border-black capitalize font-semibold">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class=" border-b border-black uppercase font-semibold relative">
                                                    <p data-popover-target="popover-{{ $loop->index }}"
                                                        class="font-bold rounded-lg text-sm py-2.5 text-center">
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
                                                <td class="border-b border-black font-semibold capitalize">
                                                    {{ $animals->anteMortem->arrived_at }}
                                                </td>
                                                <td class="border-b border-black font-semibold capitalize">
                                                    <span
                                                        class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                        {{ $animals->status }}
                                                    </span>
                                                </td>
                                                <td class="py-4 border-b border-black font-semibold capitalize">
                                                    <div class="flex justify-center gap-3">
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
        </div>

    </div>


</body>

</html>
