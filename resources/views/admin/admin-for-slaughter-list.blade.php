<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'For Slaughter List'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="flex flex-col w-full ml-[240px]">


                <section class="flex justify-evenly gap-3 pb-3 w-full h-auto px-4">
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


                <div class="mx-auto w-full px-4">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section
                        class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                        <div class="flex">


                            {{-- <input type="checkbox"> --}}
                            @include('admin.tabs.tabs')

                        </div>
                        <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                            <table class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Possible
                                            Schedule
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Butcher
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @php $index = 1 @endphp

                                    @if ($animal->isEmpty())
                                        <tr class="h-[440px]">
                                            <td colspan="6" class="py-4 border-b border-black text-center">
                                                <h1 class="font-semibold italic pb-3">No Scheduled Animal</h1>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $animals->type }}
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $animals->schedule->scheduled_at }}
                                                </td>
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $animals->butcher }}
                                                </td>
                                                <td class=" border-b border-black font-semibold capitalize">
                                                    <div class="flex justify-center gap-3">
                                                        {{-- <a data-animal-id="{{ $animals->id }}"
                                                            class="btnForSchedNav bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                            <i class='bx bx-timer'
                                                                style='color:#ffffff; font-size: 24px;'></i>
                                                        </a> --}}
                                                        <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                                            <box-icon name='navigation'
                                                                color='#ffffff'></box-icon><span>View</span>
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
            {{-- End wrapper --}}
        </div>
    </div>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
