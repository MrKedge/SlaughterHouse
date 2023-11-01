<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewing animal form</title>
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

                <h1><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </header>
            <a href="{{ route('client.overview') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='home' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">HOME</h1>
                </div>
            </a>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTRATION</h1>
                </div>
            </a>
            <a href="{{ route('client.animal.list.register') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='list-ul' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">LIST OF ANIMAL</h1>
                </div>
            </a>
            <hr class="mx-auto w-3/4">
        </div>
        {{-- this is for the table inside --}}
        <section class=" flex justify-center items-center ml-[240px] pt-[80px] h-screen">
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
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Address</label></div>
                                        <div>
                                            <p class="bg-gray-200 w-[300px] text-center capitalize">{{ $user->address }}
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
                                                {{ $animal->age_classify }}
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
                        <div class="absolute bottom-0 right-3 mb-[-60px]">
                            <input type="hidden" name="id" value="">
                            <button class="bg-[#33485c] hover:bg-[#293241] text-white font-bold py-2 px-4 rounded">
                                EDIT
                            </button>
                        </div>

                    </div>
                </div>
        </section>
    </div>


</body>

</html>
