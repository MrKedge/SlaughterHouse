<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>admin dashboard</title>
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
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='dashboard' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">DASHBOARD</h1>
                </div>
            </a>
            <p class="pl-3 text-gray-500">TABLE</p>
            <a href="{{ route('admin.view.animal.reg.list') }}">
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
    <section class="pt-[80px] pr-[40px]">
        {{-- baba ng uluhan --}}
        <div class="flex justify-between ml-[240px]">
            <div
                class="h-40 bg-white w-[250px] ml-10 rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">REGISTRATION</h1>

                    <img src="{{ asset('images/register-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px] ">
                </a>
                <div class="flex justify-center align-middle">
                    <p class="text-center text-6xl pt-5 text-gray-400">100</p>
                </div>
            </div>
            <div class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">ANIMAL</h1>

                    <img src="{{ asset('images/cow-animal-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px] w-[64px]">
                </a>
            </div>
            <div class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">OWNER</h1>
                    <img src="{{ asset('images/user-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px] ">
                </a>
            </div>
            <div class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">ACCOUNT</h1>
                    <img src="{{ asset('images/user-account-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px]">
                </a>
            </div>
        </div>
    </section>
    <div class="ml-[240px] pt-[40px]">
        <section class=" flex justify-center">
            <div class="bg-white h-auto w-[1200px] rounded-2xl">
                <h1 class="text-center font-extrabold text-[#EE6C4D] pb-8 pt-4 text-2xl">RECENT REGISTRATION</h1>
                <div class="flex justify-center relative px-4">
                    {{-- table goes here --}}

                    <table class="w-full text-center p-11 ">
                        <thead>
                            <tr class="">
                                <th class="border border-black p-2">No.</th>
                                <th class="border border-black p-2">Date</th>
                                <th class="border border-black p-2">Owner's Name</th>
                                <th class="border border-black p-2">Address</th>
                                <th class="border border-black p-2">Status</th>
                                <th class="border border-black p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <td class="py-4">1</td>
                                <td class="py-4">2023-10-16</td>
                                <td class="py-4">John Doe</td>
                                <td class="py-4">123 Main St, City, State</td>
                                <td class="py-4 font-semibold">Active</td>
                                <td class="py-4">
                                    <a
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 rounded w-14 mx-1 py-0">
                                        View
                                    </a>

                                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold p-1 rounded mx-1 py-0">
                                        delete
                                    </a>

                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
</body>

</html>
