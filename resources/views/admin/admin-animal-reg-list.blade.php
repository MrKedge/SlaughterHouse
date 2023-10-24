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

<body class="bg-[#D5DFE8] h-full w-full overflow-y-hidden">


    <div class="ml-[240px] h-[40px] bg-white z-10 flex justify-start fixed top-0 w-full">
        {{-- header --}}
        <div class="px-4 pt-2 font-extrabold text-[#0E7BBB] flex">
            <h1>ADMIN</h1>

        </div>
    </div>
    <div class="">
        <div class="fixed left-0 h-full w-[240px] bg-[#293241] text-white">
            <header class="text-center py-8 relative font-bold">
                <img src="{{ asset('images/butcher-logo-icon.png') }}" alt="image" class="z-40 absolute  top-2 p-1">
                <h1><span class="text-[#EE6C4D] pl-10">SLAUGHTER</span>HOUSE</h1>
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
        <section class=" flex justify-center  h-screen">
            <div class="bg-white h-auto w-[1200px] rounded-2xl">
                <h1 class="text-center font-extrabold text-[#EE6C4D] pb-8 pt-4 text-2xl">REGISTRATION LIST</h1>
                <div class="flex justify-center relative">
                    {{-- table goes here --}}

                    <table class="w-full text-center p-11">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Animal</th>
                                <th>Owner Name</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 0 @endphp
                            @foreach ($users as $user)
                                @foreach ($user->animals as $animal)
                                    <tr class="">
                                        <td>{{ ++$index }}</td>
                                        <td class="py-4">{{ $animal->type }}</td>
                                        <td class="py-4">{{ $animal->created_at }}</td>
                                        <td class="py-4">working for this</td>
                                        <td>{{ $user->first_name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
</body>

</html>
