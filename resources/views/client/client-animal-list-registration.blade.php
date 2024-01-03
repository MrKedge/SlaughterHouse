<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Animal List'])

<body class="bg-[#D5DFE8] overflow-hidden">




    @extends('client.layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full ">

            <section class="flex justify-start gap-20 pl-6  py-3 overflow-x-auto w-full h-auto pr-6 pb-6">
                {{-- wrapper --}}
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'pending')->count() }}</div>

                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='check-double'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'approved')->count() }}</div>
                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUGHTERED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'slaughtered')->count() }}</div>
                </div>
            </section>


            <div class="mx-auto w-full">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section
                    class=" mx-5 w-auto h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                    <h1 class="text-2xl font-bold py-3 text-[#293241]">Register List</h1>
                    <div class="scrollbar-gutter overflow-y-auto h-[420px]">
                        <table class="w-full text-center">
                            <thead>
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">No.</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @php
                                    $index = 1;

                                @endphp
                                @if ($animals->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-4 border-b border-black text-center">
                                            <h1 class="font-bold italic pb-3">No Archives</h1>

                                        </td>
                                    </tr>
                                @else
                                    @foreach ($animals as $animal)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200  ">
                                            <td class="py-4 border-b border-black">{{ $index }}.</td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animal->type }}
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                {{ $animal->created_at }}
                                            </td>
                                            <td class="py-4 font-semibold border-b text-[#7393B3] border-black uppercase">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-2.5 rounded">{{ $animal->status }}</span>
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                <div class="flex justify-center gap-3">
                                                    <a href="{{ route('client.view.animal.form', ['id' => $animal->id]) }}"
                                                        class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" data-slot="icon" class="w-6 h-6">
                                                            <path
                                                                d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                        </svg>

                                                        <span></span>
                                                    </a>
                                                </div>
                                                {{-- <a href="{{ route('client.edit.animal.form', ['id' => $animals->id]) }}"
                                            class="px-4 bg-green-500 hover:bg-green-700 text-white font-bold  rounded mx-1 py-1">
                                            Edit
                                        </a> --}}
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
