<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Approve List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('client.layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full">


            <section class="flex justify-start gap-20 pl-6  py-3 overflow-x-auto w-full h-auto pr-6 pb-6">
                {{-- wrapper --}}
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>
                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>

                    {{-- <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                        name='check-double' type='solid' color='#ee6c4d'
                        style="width: 32px; height: 32px;"></box-icon>
                </div> --}}
                </div>
                <div
                    class="h-28 w-full bg-white rounded-r-md border-l-[16px] border-[#61718e] rounded-l-md relative shadow-2xl bg-opacity-70">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>

                    {{-- <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                        name='list-check' type='solid' color='#ee6c4d'
                        style="width: 32px; height: 32px;"></box-icon>
                </div> --}}
                </div>
            </section>


            <div class="mx-auto w-full">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section
                    class=" mx-5 w-auto h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                    <h1 class="text-2xl font-bold py-3 text-[#293241]">Approved Animal Table</h1>
                    <div class="scrollbar-gutter overflow-y-auto h-[420px]">
                        <table class="w-full text-center">
                            <thead>
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Id</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Approved Time
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
                                @if ($animal->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-4 border-b border-black text-center">
                                            <h1 class="font-bold italic pb-3">No Approve</h1>

                                        </td>
                                    </tr>
                                @else
                                    @foreach ($animal as $animals)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                            <td class="py-4 border-b border-black">{{ $animals->id }}</td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animals->type }}
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                {{ $animals->approved_at }}
                                            </td>
                                            <td class="py-4 border-b border-black capitalize font-medium">
                                                {{ $animals->status }}
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                                    class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-1">
                                                    View
                                                </a>
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
