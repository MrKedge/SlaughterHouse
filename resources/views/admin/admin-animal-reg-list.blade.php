<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Pending List'])

<body class="bg-[#D5DFE8]">


    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}



        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>

            {{-- this is for the table inside --}}


            <div class="flex flex-col w-full overflow-y-auto ml-[240px]">{{-- Inside wrapper --}}


                <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4">
                    {{-- wrapper --}}
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>{{ $animals->where('status', 'pending')->count() }}
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


                {{-- table section --}}
                <div class="z-30 px-4"> {{-- table wrapper --}}
                    <section class=" flex justify-center">
                        <div class=" bg-white h-[540px] w-full rounded-md ">
                            <h1 class="text-center font-extrabold text-[#293241] pb-2 pt-4 text-3xl">REGISTRATION LIST
                            </h1>
                            <div class="p-4">
                                <div
                                    class="scrollbar-gutter flex justify-center relative px-4 max-h-[400px] overflow-y-auto">
                                    {{-- table goes here --}}

                                    <table class="w-full text-center">
                                        <thead>
                                            <tr>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">No.</th>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                                </th>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Owner
                                                    Name</th>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                                </th>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status
                                                </th>
                                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $index = 0 @endphp
                                            @if ($animals->isEmpty())
                                                <tr>
                                                    <td colspan="7"
                                                        class="py-4 border-b border-black text-center h-[400px]">
                                                        <h1 class="font-semibold italic pb-3">No Pending Animal</h1>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($animals as $animal)
                                                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white' }}">
                                                        <td class="py-4 border-b border-black">{{ ++$index }}.</td>
                                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                                            {{ $animal->type }}</td>
                                                        <td class="py-4 border-b border-black capitalize">
                                                            {{ $animal->user->first_name }}
                                                            {{ $animal->user->last_name }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">
                                                            {{ $animal->created_at }}
                                                        </td>
                                                        <td class="py-4 border-b border-black font-bold uppercase"
                                                            style="
                                                    @if ($animal->status == 'pending') color: orange;
                                                    @elseif ($animal->status == 'approved') color: green;
                                                    @elseif ($animal->status == 'rejected') color: red; @endif">

                                                            {{ $animal->status }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">

                                                            <a href="{{ route('admin.view.animal.reg.form', ['id' => $animal->id]) }}"
                                                                class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-1">
                                                                View
                                                            </a>

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            @endif <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </section>
                </div>

            </div>

        </div>

    </div>
</body>

</html>
