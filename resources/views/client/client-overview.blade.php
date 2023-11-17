<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client overview</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden ">


    <div>
        {{-- HEADER --}}
        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div
                class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <a href="#" class="font-extrabold capitalize px-4 text-[#293241] flex items-center gap-1">
                        <div id="open-div"><box-icon type='solid' name='down-arrow' size='14px'></div>
                        </box-icon>
                        <div id="close-div" class="hidden"><box-icon type='solid' name='up-arrow'
                                size='14px'></box-icon>
                        </div>
                        {{ auth()->user()->first_name }}
                    </a>
                @endauth
                <nav id="toggle-settings"
                    class="space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
                    <a href="#" id="" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='user-circle'></box-icon>profile</a>
                    <a href="#" id="show-log-out" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='log-out'></box-icon>log-out</a>
                </nav>
            </div>
        </div>
        {{-- end header --}}




        {{-- main content --}}
        <div class="flex">


            <div class="inline-block"> @include('client.layout.sidepanel')</div>


            <div class="flex flex-col w-full gap-3"> {{-- below header wrapper --}}
                <section
                    class="flex justify-start gap-3 pl-6  py-3 overflow-x-auto bg-[#293241] w-full border-l border-t h-auto">
                    {{-- wrapper --}}
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#ee6c4d' style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'pending')->count() }}</div>

                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'approved')->count() }}</div>
                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUTHERED</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                            {{ $animals->where('status', 'slaughtered')->count() }}</div>
                    </div>
                </section>


                <div class="flex justify-center items-center">
                    <nav id="pop-up"
                        class="absolute top-1/2 z-40  bg-white w-[300px] h-auto text-center  rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border"
                        style="display: none;">
                        <div class="rounded-2xl shadow-2xl bg-opacity-5 bg-blur-lg  backdrop-filter backdrop-blur-lg">
                            <h1 class="pt-4 text-2xl font-bold">Continue Log-out?</h1>
                            <div class="py-9 flex justify-center w-full gap-6 mx-auto">
                                <a href="{{ route('log-out') }}" id="alertLogout"
                                    class="bg-[#293241] w-24 text-white py-2 rounded">YES</a>
                                <a href="#" id="hide-log-out"
                                    class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
                            </div>
                        </div>
                    </nav>


                    <div class="z-30 "> {{-- table wrapper --}}
                        <section class=" flex justify-center">
                            <div class="bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
                                <h1 class="text-center font-extrabold text-[#293241] pb pt-4 text-2xl">RECENT
                                    REGISTRATION
                                </h1>
                                <div class="p-4 ">
                                    <div
                                        class="scrollbar-gutter flex justify-center relative px-4 max-h-[300px] overflow-y-auto">
                                        <table class="w-full text-center">
                                            <thead class="">
                                                <tr>
                                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                        Animal
                                                    </th>
                                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                                    </th>
                                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                        Status
                                                    </th>
                                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                        Destination
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="">

                                                @php $index = 1 @endphp
                                                @foreach ($recent as $animal)
                                                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                                            {{ $animal->type }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">{{ $animal->created_at }}
                                                        </td>
                                                        <td class="py-4 font-semibold border-b border-black uppercase"
                                                            style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : ($animal->status === 'rejected' ? 'red' : 'black')) }}">
                                                            {{ $animal->status }}</td>
                                                        <td class="py-4 border-b border-black font-semibold capitalize">
                                                            {{ $animal->destination }}
                                                        </td>

                                                    </tr>
                                                    @php $index++ @endphp
                                                @endforeach
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

    </div>

    </div>
    <script>
        logoutUser();
    </script>
</body>

</html>
