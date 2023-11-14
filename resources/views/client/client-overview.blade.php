<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client overview</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden">

    <div> {{-- wrapper --}}
        <div class="z-10 flex items-center justify-between bg-white h-[40px] sticky top-0">
            {{-- header --}}
            <div class="text-center font-bold w-[240px] bg-[#293241] h-full p-2">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div>
                @auth
                    <p class="font-extrabold capitalize px-4 text-[#293241] ">
                        {{ auth()->user()->first_name }}
                    </p>
                @endauth
            </div>

        </div> {{-- end header --}}
        @include('client.layout.sidepanel')

        <section class="flex justify-center mx-auto pt-10 overflow-x-auto">{{-- wrapper --}}
            <div class="flex gap-10">
                <div class="h-24 bg-white w-auto rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">

                    <h1 class="text-center px-9 pt-4 text-[#EE6C4D] font-bold">PENDING</h1>

                    {{-- <span class=" absolute top-0 right-0"><box-icon name='hand' type='solid' color='#ee6c4d'
                                    style="width: 32px; height: 32px;"></box-icon></span> --}}

                    <p class="text-center text-4xl text-gray-400">
                        {{ $animals->where('status', 'pending')->count() }}</p>

                </div>
                <div class="h-24 bg-white w-auto rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">

                    <h1 class="text-center px-9 pt-4 text-[#EE6C4D] font-bold">APPROVED</h1>

                    {{-- <span class=" absolute top-0 right-0"><box-icon name='check-double' color='#ee6c4d'
                                    style="width: 64px; height: 64px;"></box-icon></span> --}}
                    <p class="text-center text-4xl text-gray-400">
                        {{ $animals->where('status', 'approved')->count() }}</p>
                </div>
                <div class="h-24 bg-white w-auto rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">

                    <h1 class="text-center px-9 pt-4 text-[#EE6C4D] font-bold">SLAUTHERED</h1>
                    {{-- <span class=" absolute top-0 right-0"><box-icon name='list-ul' color='#ee6c4d'
                                style="width: 64px; height: 64px;"></box-icon></span> --}}
                    <p class="text-center text-4xl text-gray-400">
                        {{ $animals->where('status', 'slaughtered')->count() }}</p>
                </div>
            </div>
        </section>
    </div>

    <div class="pt-[40px] ml-[60px]">
        <section class=" flex justify-center">
            <div class="bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
                <h1 class="text-center font-extrabold text-[#293241] pb pt-4 text-2xl">RECENT REGISTRATION</h1>
                <div class="p-4 ">
                    <div class="flex justify-center relative px-4 max-h-[300px] overflow-y-auto">
                        <table class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Destination
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @php $index = 1 @endphp
                                @foreach ($recent as $animal)
                                    <tr class="">

                                        <td class="py-4 border-b border-black uppercase font-semibold">
                                            {{ $animal->type }}
                                        </td>
                                        <td class="py-4 border-b border-black">{{ $animal->created_at }}</td>
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
    <div class="flex justify-center items-center">
        <nav id="pop-up"
            class="absolute top-1/2  bg-white w-[300px] h-auto text-center  rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border"
            style="display: none;">
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
    </div>
    <script>
        logoutUser();
    </script>
</body>

</html>
