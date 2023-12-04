<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Butcher Overview'])



<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Butcher Overview'])

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="min-h-screen">{{-- wrapperr --}}

        {{-- header --}}
        <div class="z-50"> @include('butcher.layout.butcher-header')</div>
        {{-- header --}}


        <div class="flex">


            <div class="inline-block z-40"> @include('butcher.layout.butcher-panel')</div>


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
                        class="z-10 mx-5 w-auto h-auto bg-white rounded-md shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                        <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80">Public Butcher Animals</h1>
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
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @php
                                        $index = 1;

                                    @endphp
                                    @if ($animal->isEmpty())
                                        <tr>
                                            <td colspan="6" class="py-4 border-b border-black text-center h-[400px]">
                                                <h1 class="font-bold italic pb-3">No For Slaughter Animal</h1>

                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black ">
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
                                                <td class="py-4 border-b border-black uppercase ">
                                                    {{ $animals->status }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize">
                                                    {{ $animals->butcher }}
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
