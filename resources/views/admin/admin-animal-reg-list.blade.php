<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>view list registration</title>
</head>

<body class="bg-[#D5DFE8] h-full w-full">


    <div class="ml-[240px] h-[40px] bg-white z-10 flex justify-start fixed top-0 w-full">
        {{-- header --}}
        <div class="px-4 pt-2 font-extrabold text-[#0E7BBB] flex">
            <h1>ADMIN</h1>

        </div>
    </div>
    <div class="">
        <div class="fixed left-0 h-full w-[240px] bg-[#293241] text-white">
            <header class="text-center py-8  font-bold">

                <h1><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </header>
            <a href="{{ route('admin.dashboard') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='dashboard' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">DASHBOARD</h1>
                </div>
            </a>
            <p class="pl-3 text-gray-500">TABLE</p>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTRATION</h1>
                </div>
            </a>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='list-ul' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">ANIMAL</h1>
                </div>
            </a>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='user-circle' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">OWNER</h1>
                </div>
            </a>
            <p class="pl-3 text-gray-500">REPORTS</p>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='report' type='solid' flip='horizontal'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">LRME</h1>
                </div>
            </a>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='report' type='solid' flip='horizontal'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">SSHPDP</h1>
                </div>
            </a>
            <p class="pl-3 text-gray-500">OPTION</p>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='group' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">USER ACCOUNTS</h1>
                </div>
            </a>
            <hr class="mx-auto w-3/4">
        </div>
        {{-- this is for the table inside --}}
    </div>
    <div class="ml-[240px] pt-[80px]">
        <section class=" flex justify-center">
            <div class="bg-white h-auto w-[1200px] rounded-2xl">
                <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION LIST</h1>
                <div class="p-4">
                    <div class="flex justify-center relative px-4 max-h-[500px] overflow-y-auto">
                        {{-- table goes here --}}

                        <table class="w-full text-center">
                            <thead>
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">No.</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Owner Name</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Address</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status</th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 0 @endphp
                                @foreach ($users as $user)
                                    @foreach ($user->animals as $animal)
                                        <tr class="">
                                            <td class="py-4 border-b border-black">{{ ++$index }}.</td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animal->type }}</td>
                                            <td class="py-4 border-b border-black capitalize">{{ $user->first_name }}
                                                {{ $user->last_name }}</td>
                                            <td class="py-4 border-b border-black">{{ $animal->created_at }}</td>
                                            <td class="py-4 border-b border-black capitalize">{{ $user->address }}</td>
                                            <td class="py-4 border-b border-black font-bold uppercase"
                                                style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : ($animal->status === 'rejected' ? 'red' : 'black')) }}">
                                                {{ $animal->status }}
                                            </td>
                                            <td class="py-4 border-b border-black">

                                                <a href="{{ route('admin.view.animal.reg.form', ['id' => $animal->id]) }}"
                                                    class="bg-blue-500 hover-bg-blue-700 text-white font-bold p-1  w-14 mx-1 py-0">
                                                    View
                                                </a>

                                                <a
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold p-1 mx-1 py-0">
                                                    delete
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                @endforeach
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
</body>

</html>
