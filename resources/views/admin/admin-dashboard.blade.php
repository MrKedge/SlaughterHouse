<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>admin dashboard</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div
                class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <a href="#" class="font-extrabold capitalize px-4 text-[#293241] flex items-center gap-1">
                        <div id="open-div"><box-icon type='solid' name='down-arrow' size='14px' color='#293241'></div>
                        </box-icon>
                        <div id="close-div" class="hidden"><box-icon type='solid' name='up-arrow' color='#293241'
                                size='14px'></box-icon>
                        </div>
                        {{ auth()->user()->first_name }}
                    </a>
                @endauth
                <nav id="toggle-settings"
                    class="space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
                    <a href="#" id="" class="px-6 w-36 gap-2 flex font-bold"><box-icon name='user-circle'
                            color='#293241'></box-icon>profile</a>
                    <a href="#" id="show-log-out" class="px-6 w-36 gap-2 flex font-bold"><box-icon name='log-out'
                            color='#293241'></box-icon>log-out</a>
                </nav>
            </div>
        </div>
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>

            {{-- this is for the table inside --}}


            <div class="flex flex-col w-full overflow-y-auto ml-[240px]">{{-- Inside wrapper --}}


                <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4">
                    {{-- wrapper --}}
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>{{ $animal->where('status', 'pending')->count() }}
                        </div>

                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>{{ $animal->count() }}
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-opacity-20">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>{{ $user->where('role', 'client')->count() }}
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>{{ $animal->where('status', 'approved')->count() }}
                        </div>
                    </div>
                </section>


                <section class="h-full gap-3 pt-0 w-full  px-4">

                    {{-- table wrapper --}}
                    <section class=" flex justify-center">
                        <div class="scrollbar-gutter bg-white h-auto w-full rounded-2xl overflow-y-auto ">
                            <h1 class="text-center font-extrabold text-[#293241] pb-2 pt-4 text-3xl">RECENT
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

                                            @if ($recent->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="py-4 border-b border-black text-center">
                                                        <h1 class="font-semibold italic pb-3">No Recent Register
                                                            Animal
                                                        </h1>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($recent as $animal)
                                                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white' }}">
                                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                                            {{ $animal->type }}
                                                        </td>
                                                        <td class="py-4 border-b border-black">
                                                            {{ $animal->created_at }}
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
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                </section>


                {{-- <div class="flex gap-3 m-4 justify-between items-center">

                    <div class="w-[400px] h-[400px] bg-white">

                    </div>


                    <div class="w-[400px] h-[400px] bg-white">

                    </div>

                </div> --}}





            </div>



        </div>
    </div>{{-- End wrapper --}}

    <div class="flex justify-center">
        <nav id="pop-up"
            class="hidden absolute top-1/2 z-40  bg-white w-[300px] h-auto text-center  rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border">
            <div class="rounded-2xl shadow-2xl bg-opacity-5 bg-blur-lg  backdrop-filter backdrop-blur-lg">
                <h1 class="pt-4 text-2xl font-bold">Continue Log-out?</h1>
                <div class="py-9 flex justify-center w-full gap-6 mx-auto">
                    <a href="{{ route('log-out') }}" id="alertLogout"
                        class="bg-[#293241] w-24 text-white py-2 rounded">YES</a>
                    <a href="#" id="hide-log-out" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
                </div>
            </div>
        </nav>
    </div>

    <script>
        logoutUser();
    </script>
</body>

</html>
