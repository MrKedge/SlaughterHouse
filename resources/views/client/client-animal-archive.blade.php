<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="">{{-- wrapperr --}}
        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div
                class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <p class="font-extrabold capitalize px-4 text-[#293241] ">
                        {{ auth()->user()->first_name }}
                    </p>
                @endauth
            </div>
        </div>


        <div class="flex">


            <div class="inline-block "> @include('client.layout.sidepanel')</div>


            {{-- main content --}}


            <div class="flex flex-col w-full gap-3">


                <section
                    class="flex justify-start gap-3 pl-6  py-3 overflow-x-auto bg-[#293241] w-full border-l border-t h-auto">
                    {{-- wrapper --}}
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>
                        {{-- 
                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#ee6c4d' style="width: 32px; height: 32px;"></box-icon>
                        </div> --}}

                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>

                        {{-- <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div> --}}
                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg"></h1>

                        {{-- <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div> --}}
                    </div>
                </section>


                <div class="mx-auto pt-10">
                    <section class="">
                        <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
                            <div class="flex justify-between p-2 items-center">
                                <h1 class="text-[#293241] font-extrabold py-2 px-4 text-2xl">Archives</h1>
                                <div>
                                    <button type="submit" value="ADD"
                                        class="bg-[#0E7BBB] text-white px-4 py-1 rounded-2xl">ADD</button>
                                </div>
                            </div>
                            <div class="p-4 ">
                                <div
                                    class="scrollbar-gutter flex justify-center relative px-4 max-h-[400px] overflow-y-auto">
                                    <table class="w-full text-center">
                                        <thead class="">
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
                                            @if ($animal->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="py-4 border-b border-black text-center">
                                                        <h1 class="font-bold italic pb-3">No Archives</h1>

                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($animal as $animals)
                                                    <tr class="">
                                                        <td class="py-4 border-b border-black">{{ $index }}.</td>
                                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                                            {{ $animals->type }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">
                                                            {{ $animals->created_at }}
                                                        </td>
                                                        <td
                                                            class="py-4 font-semibold border-b text-[#7393B3] border-black uppercase">
                                                            {{ $animals->status }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">
                                                            <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                                                class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-1">
                                                                View
                                                            </a>
                                                            <a href="{{ route('client.edit.animal.form', ['id' => $animals->id]) }}"
                                                                class="px-4 bg-green-500 hover:bg-green-700 text-white font-bold  rounded mx-1 py-1">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @php $index++ @endphp
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </div>
        </div>



    </div>
</body>

</html>
