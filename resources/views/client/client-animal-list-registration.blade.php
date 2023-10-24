<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of animal</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] h-full w-full">

    <div>
        <div class="fixed bg-white top-0 w-screen h-[40px] ml-[240px] pr-[240px]">
            {{-- header --}}
            @auth
                <p class="font-extrabold capitalize px-4 pt-2 justify-end flex text-[#293241] ">
                    {{ auth()->user()->first_name }}
                </p>
            @endauth
        </div>
        <div class="fixed left-0 h-full w-[240px] bg-[#293241] text-white">
            <header class="text-center py-8  font-bold">
                {{-- <img src="" alt="image" class="z-40 absolute  top-2 p-1"> --}}
                <h1><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </header>
            <a href="{{ route('client.overview') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='home' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">HOME</h1>
                </div>
            </a>
            <a href="{{ route('client.animal.register') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#FFFFFF'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTRATION</h1>
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
        <section class="ml-[240px] pt-[80px]">
            <div class="bg-white mx-auto rounded-2xl h-auto w-[1200px] mb-10">
                <div class="flex justify-between p-2 items-center">
                    <h1 class="text-[#293241] font-extrabold py-2 px-4">LIST OF REGISTRATION</h1>
                    <div>
                        <button type="submit" value="ADD"
                            class="bg-[#0E7BBB] text-white px-4 py-1 rounded-2xl">ADD</button>
                    </div>
                    <div>
                        <form action="" class="flex items-center mr-10">
                            <input type="text" placeholder="Search..."
                                class="rounded-2xl m-0 my-2 border-gray-700 border p-1 text-center">
                            <div class="p-2 pl-1">
                                <button>
                                    <img src="{{ asset('images/search-icon.png') }}" alt="Image" class="">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex justify-center relative px-4">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="">
                                <th class="border border-black p-2">No.</th>
                                <th class="border border-black p-2">Animal</th>
                                <th class="border border-black p-2">Date</th>
                                <th class="border border-black p-2">Status</th>
                                <th class="border border-black p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $index = 1 @endphp
                            @foreach ($user->animals as $animal)
                                <tr class="">
                                    <td class="py-4">{{ $index }}</td>
                                    <td class="py-4">{{ $animal->type }}</td>
                                    <td class="py-4">{{ $animal->created_at }}</td>
                                    <td class="py-4">working for this</td>
                                    <td class="py-4">

                                        <a
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


</body>

</html>

</div>


</body>

</html>
