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

<body class="bg-[#D5DFE8]">

    <div class="h-screen">{{-- wrapperr --}}
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


        {{-- main content --}}
        <div class="flex justify-center items-center pt-28">
            <section class="">
                <div class="bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
                    <div class="flex justify-between p-2 items-center">
                        <h1 class="text-[#293241] font-extrabold py-2 px-4 text-2xl">LIST OF REGISTRATION</h1>
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
                    <div class="p-4 ">
                        <div class="flex justify-center relative px-4 max-h-[400px] overflow-y-auto">
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
                                        $animals = $user->animals->sortByDesc('created_at');
                                    @endphp

                                    @foreach ($animals as $animal)
                                        <tr class="">
                                            <td class="py-4 border-b border-black">{{ $index }}.</td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animal->type }}
                                            </td>
                                            <td class="py-4 border-b border-black">{{ $animal->created_at }}</td>
                                            <td class="py-4 font-semibold border-b border-black uppercase"
                                                style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : ($animal->status === 'rejected' ? 'red' : 'black')) }}">
                                                {{ $animal->status }}
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                <a href="{{ route('client.view.animal.form', ['id' => $animal->id]) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-0">
                                                    View
                                                </a>

                                                <a href="{{ route('client.edit.animal.form', ['id' => $animal->id]) }}"
                                                    class="p-3 bg-green-500 hover:bg-green-700 text-white font-bold  rounded mx-1 py-0">
                                                    Edit
                                                </a>
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
</body>

</html>
