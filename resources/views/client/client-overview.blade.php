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

<body class="bg-[#D5DFE8] h-full w-full overflow-y-hidden">

    <div>
        <div class="fixed flex justify-between bg-white top-0 w-screen h-[40px] ml-[240px] pr-[240px]">
            {{-- header --}}
            @auth
                <p class="font-extrabold capitalize px-4 pt-2  text-[#293241] ">
                    {{ auth()->user()->first_name }}
                </p>
            @endauth
            <a href="{{ route('log-out') }}" class="font-semibold capitalize px-4 pt-2  text-[#293241] flex ">
                <box-icon name='log-out'></box-icon>
                <p>Log-out</p>
            </a>
        </div>
        <div class="fixed left-0 h-full w-[240px] bg-[#293241] text-white">
            <header class="text-center py-8  font-bold">
                {{-- <img src="" alt="image" class="z-40 absolute  top-2 p-1"> --}}
                <h1><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </header>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='home' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">HOME</h1>
                </div>
            </a>
            <a href="{{ route('client.animal.register') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#FFFFFF'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTER ANIMAL</h1>
                </div>
            </a>
            <a href="{{ route('client.animal.list.register') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='list-ul' color='#FFFFFF'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">LIST OF ANIMAL</h1>
                </div>
            </a>
            <hr class="mx-auto w-3/4">
        </div>

        {{-- this is for the table inside --}}
        <section class="pt-[80px] pr-[40px]">
            {{-- baba ng uluhan --}}
            <div class="flex justify-start gap-10 ml-[240px]">
                <div
                    class="h-40 bg-white w-[250px] ml-10 rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                    <a href="">
                        <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">PENDING</h1>

                        <span class=" absolute top-0 right-0"><box-icon name='hand' type='solid' color='#ee6c4d'
                                style="width: 64px; height: 64px;"></box-icon></span>
                    </a>
                    <div class="flex justify-center align-middle">
                        <p class="text-center text-6xl pt-5 text-gray-400">100</p>
                    </div>
                </div>
                <div
                    class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                    <a href="">
                        <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">APPROVED</h1>

                        <span class=" absolute top-0 right-0"><box-icon name='check-double' color='#ee6c4d'
                                style="width: 64px; height: 64px;"></box-icon></span>
                    </a>
                </div>
                <div
                    class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                    <a href="">
                        <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">LIST OF ANIMAL</h1>
                        <span class=" absolute top-0 right-0"><box-icon name='list-ul' color='#ee6c4d'
                                style="width: 64px; height: 64px;"></box-icon></span>
                    </a>
                </div>

            </div>
        </section>
        <div class="ml-[240px] pt-[40px]">
            <section class=" flex justify-center">
                <div class="bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
                    <h1 class="text-center font-extrabold text-[#293241] pb pt-4 text-2xl">RECENT REGISTRATION</h1>
                    <div class="p-4 ">
                        <div class="flex justify-center relative px-4 max-h-[300px] overflow-y-auto">
                            <table class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2 ">No.</th>
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

                                    @php $index = 1 @endphp
                                    @foreach ($user->animals as $animal)
                                        <tr class="">
                                            <td class="py-4 border-b border-black">{{ $index }}.</td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animal->type }}
                                            </td>
                                            <td class="py-4 border-b border-black">{{ $animal->created_at }}</td>
                                            <td class="py-4 font-semibold border-b border-black uppercase"
                                                style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : 'black') }}">
                                                {{ $animal->status }}</td>
                                            <td class="py-4 border-b border-black">

                                                <a href="{{ route('client.view.animal.form', ['id' => $animal->id]) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-0">
                                                    View
                                                </a>

                                                <a
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold p-1 rounded mx-1 py-0">
                                                    delete
                                                </a>

                                            </td>

                                        </tr>
                                        @php $index++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </div>
    </div>


</body>

</html>
