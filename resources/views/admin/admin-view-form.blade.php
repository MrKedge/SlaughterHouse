<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>Receive registration</title>
</head>

<body class="bg-[#D5DFE8] h-full w-full">

    <div>
        <div class="ml-[240px] h-[40px] bg-white z-10 flex justify-start fixed top-0 w-full">
            {{-- header --}}
            <div class="px-4 pt-2 font-extrabold text-[#0E7BBB] flex">
                <h1>ADMIN</h1>

            </div>
        </div>
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
        <section class=" flex justify-center items-center ml-[240px] pt-[80px] h-screen">
            <div class="bg-white w-[750px] h-[550px]">
                <h1 class="text-center font-extrabold text-[#EE6C4D] pb-8 pt-4 text-2xl">REGISTRATION DETAILS</h1>
                <div class="flex justify-center relative">

                    <div class="flex gap-3">
                        <div>
                            <div>
                                <div class="pl-3">
                                    <h1 class="font-bold">Owner Information</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">

                                <div class="flex justify-between gap-3">
                                    <div class=" gap-2">
                                        <div><label for="">Owner Name</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px]">Doe</p>
                                        </div>
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Address</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px]">lorem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pl-3">
                                    <h1 class="font-bold">Documents</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">
                                <div class="flex gap-14">
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Certificate of Ownership</label></div>
                                        <div><input type="file" name="fileToUpload" id="fileToUpload" class="">
                                        </div>
                                    </div>
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Cert. of Transfer of Large Cattle</label></div>
                                        <div><input type="file" name="fileToUpload" id="fileToUpload" class="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div class="pl-3 mb-4">
                                    <h1 class="font-bold">Animal Information</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">
                                <div class="flex gap-14">
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Kind of Animal</label></div>
                                        <p class="bg-gray-200 gap-3">lorem</p>
                                    </div>
                                    <div>
                                        <div><label for="">Butcher</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] ">lorem</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pl-3 mb-4">

                                <div class="flex justify-between gap-3">
                                    <div class=" gap-2">
                                        <div><label for="">Age Classification</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] ">lorem</p>
                                        </div>
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Destination
                                            </label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px]">lorem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gap-3">
                                <div class="flex justify-between">
                                    <div class="flex">
                                        <div class="pl-3">
                                            <div><label for="">Gender</label></div>
                                            <div>
                                                <p class="bg-gray-200 gap-3 w-12">lorem</p>
                                            </div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Age</label></div>
                                            <div>
                                                <p class="bg-gray-200 gap-3 w-12">lorem</p>
                                            </div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Live Weight</label></div>
                                            <div>
                                                <p class="bg-gray-200 gap-3 w-24">lorem</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="absolute bottom-0 right-3 mb-[-60px]">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                APPROVE
                            </button>

                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                REJECT
                            </button>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>

</html>
