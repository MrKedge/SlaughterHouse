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

    <div class=""> {{-- wrapper --}}

        <div class="ml-[240px] h-[40px] bg-white z-10 flex justify-start fixed top-0 w-full">
            {{-- header --}}
            <div class="px-4 pt-2 font-extrabold text-[#0E7BBB] flex">
                <h1>ADMIN</h1>

            </div>
        </div>
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
            <a href="{{ route('admin.view.animal.reg.list') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTER LIST</h1>
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
        <section class=" flex justify-center items-center ml-[240px] pt-[80px] h-screen relative">
            <div class="bg-white w-[750px] h-[550px]">
                <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION DETAILS</h1>
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
                                        <p class="bg-gray-200 w-[300px] text-center capitalize">
                                            {{ $user->first_name }} {{ $user->last_name }}</p>
                                        <div>
                                            {{-- <p class="bg-gray-200 w-[300px] capitalize">{{ $user->first_name }}
                                                {{ $user->last_name }}</p> --}}
                                        </div>
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Address</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] text-center capitalize">
                                                {{ $user->address }}
                                            </p>
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
                                        <p class="bg-gray-200 gap-3 text-center">{{ $animal->type }}</p>
                                    </div>
                                    <div>
                                        <div><label for="">Butcher</label></div>
                                        <div>

                                            <p class="bg-gray-200 w-[300px] text-center">
                                                {{ $animal->butcher }}
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pl-3 mb-4">

                                <div class="flex justify-between gap-3">
                                    <div class=" gap-2">
                                        <div><label for="">Age Classification</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] text-center">
                                                {{ $animal->age_classify ?? 'None' }}
                                            </p>

                                        </div>
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Destination
                                            </label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] text-center">
                                                {{ $animal->destination }}
                                            </p>
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
                                                <p class="bg-gray-200 gap-3 w-12 text-center">
                                                    {{ $animal->gender }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Age</label></div>
                                            <div>
                                                <p class="bg-gray-200 gap-3 w-12 text-center">
                                                    {{ $animal->age }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Live Weight</label></div>
                                            <div>
                                                <p class="bg-gray-200 gap-3 w-24 text-center">
                                                    {{ $animal->live_weight }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                    <div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <form action="{{ route('approve.status', ['id' => $animal->id]) }}" method="POST">
                            @csrf
                            <div class="absolute bottom-0 right-3 mb-[-60px]">

                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    APPROVE
                                </button>
                        </form>
                        <a id="show-remarks"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            REJECT
                        </a>

                    </div>

                </div>
            </div>
            <nav id="remarks-pop-up"
                class="hidden absolute bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl backdrop-filter backdrop-blur-lg">
                <div class="">
                    <textarea name="remarks" placeholder="Enter Remarks..." required
                        class="w-[300px] h-[200px] mt-3 resize-none border-2 border-dashed border-gray-500 p-2"></textarea>
                    <h1 class="block font-semibold">Would you like to Continue?</h1>
                    <div class="py-3 flex justify-center gap-6 mx-auto">
                        <form method="post" action="{{ route('reject.status', ['id' => $animal->id]) }}">
                            @csrf
                            <button class="bg-[#293241] w-24 text-white py-2 rounded">YES</button>
                        </form>
                        <a href="#" id="close-remarks" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
                    </div>
                </div>
            </nav>
        </section>
        </form>
    </div>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        rejectRemark();
    </script>
</body>

</html>
