<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="min-h-screen w-screen ">

        {{-- header --}}
        @include('client.layout.client-header')
        {{-- header --}}



        <div class="flex">


            <div class="inline-block "> @include('client.layout.sidepanel')</div>


            {{-- main content --}}


            <div class="flex flex-col w-full">


                <section class="flex justify-evenly gap-3 pl-6  py-3 overflow-x-auto  w-full h-auto pr-6">
                    {{-- wrapper --}}

                    {{-- wrapper --}}
                    <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#ee6c4d' style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'pending')->count() }}</div>

                    </div>
                    <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVED</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'approved')->count() }}</div>
                    </div>
                    <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SCHEDULED</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('scheduled_at', '!=', null)->count() }}</div>
                    </div>
                    <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUGHTERED</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'slaughtered')->count() }}</div>
                    </div>

                </section>



                <section class="px-6">
                    <div class="scrollbar-gutter bg-white h-auto rounded-2xl overflow-y-auto w-full">
                        <div class="flex justify-between p-2 items-center">
                            <h1 class="text-[#293241] font-extrabold py-2 px-4 text-2xl">LIST OF REGISTRATION</h1>

                            <div>
                                <form action="" class="flex items-center mr-10">
                                    <input type="text" placeholder="Search..."
                                        class="rounded-2xl m-0 my-2 border-gray-700 border p-1 text-center">
                                    <div class="p-2 pl-1">
                                        <button>
                                            <img src="{{ asset('images/search-icon.png') }}" alt="Image"
                                                class="">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="p-4 h-[475px]">
                            <div class="scrollbar-gutter flex justify-center relative px-4  overflow-y-auto">
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
                                            $animals = $animals->sortByDesc('created_at');
                                        @endphp

                                        @if ($animals->isEmpty())
                                            <tr>
                                                <td colspan="5" class="py-4 border-b border-black text-center">
                                                    <h1 class="font-semibold italic pb-3">No Pending Animal</h1>
                                                    <a href="{{ route('client.animal.register') }}"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 w-40 rounded flex mx-auto">
                                                        <box-icon name='pencil'
                                                            color='#ffffff'></box-icon><span>Register Animal</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($animals as $animal)
                                                <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white' }}">

                                                    <td class="py-4 border-b border-black">{{ $index }}.</td>
                                                    <td class="py-4 border-b border-black uppercase font-semibold">
                                                        {{ $animal->type }}
                                                    </td>
                                                    <td class="py-4 border-b border-black">
                                                        {{ $animal->created_at }}
                                                    </td>
                                                    <td class="py-4 font-semibold border-b border-black uppercase"
                                                        style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : ($animal->status === 'rejected' ? 'red' : 'black')) }}">
                                                        {{ $animal->status }}
                                                    </td>
                                                    <td class="py-4 border-b border-black">
                                                        <a href="{{ route('client.view.animal.form', ['id' => $animal->id]) }}"
                                                            class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-1">
                                                            View
                                                        </a>

                                                        <a href="{{ route('client.edit.animal.form', ['id' => $animal->id]) }}"
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
</body>

</html>
