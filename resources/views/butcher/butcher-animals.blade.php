<!DOCTYPE html>
<html lang="en">



@include('layout.html-head', ['pageTitle' => 'Butcher Animal List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="min-h-screen">{{-- wrapperr --}}

        {{-- header --}}
        @include('butcher.layout.butcher-header')
        {{-- header --}}


        <div class="flex">


            <div class="inline-block "> @include('butcher.layout.butcher-panel')</div>


            {{-- main content --}}


            <div class="flex flex-col w-full ">





                <div class="mx-auto w-full mt-1">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section
                        class="z-10 mx-5 w-auto h-auto bg-white rounded-md shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                        <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80">For Inspection</h1>
                        <div class="scrollbar-gutter overflow-y-auto h-[420px]">
                            <table class="w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">No.</th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal</th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Owner
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Time of
                                            Slaughter
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Butcher
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @php
                                        $index = 1;

                                    @endphp
                                    @if ($animal->isEmpty())
                                        <tr>
                                            <td colspan="7" class="py-4 border-b border-black text-center">
                                                <h1 class="font-bold italic pb-3">No Schedule</h1>

                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                                <td class="py-4 border-b border-black">{{ $index }}.</td>
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $animals->type }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class="py-4 border-b border-black">
                                                    {{ $animals->scheduled_at }}
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold ">
                                                    {{ $animals->status }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $animals->butcher }}
                                                </td>
                                                <td class="py-4 border-b border-black">
                                                    <a href="{{ route('butcher.view.form', ['id' => $animals->id]) }}"
                                                        class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-1">
                                                        View
                                                    </a>
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
