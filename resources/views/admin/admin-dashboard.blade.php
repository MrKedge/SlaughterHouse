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

<body class="bg-[#D5DFE8] overflow-hidden">

    <div>{{-- wrapper --}}



        {{-- HEADER --}}
        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <a href="#" class="font-extrabold capitalize px-4 text-[#293241] flex items-center gap-1">
                        <div id="open-div"><box-icon type='solid' name='down-arrow' size='14px'></div>
                        </box-icon>
                        <div id="close-div" class="hidden"><box-icon type='solid' name='up-arrow'
                                size='14px'></box-icon>
                        </div>
                        {{ auth()->user()->first_name }}
                    </a>
                @endauth
                <nav id="toggle-settings"
                    class="space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
                    <a href="#" id="" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='user-circle'></box-icon>profile</a>
                    <a href="#" id="show-log-out" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='log-out'></box-icon>log-out</a>
                </nav>
            </div>
        </div>
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="inline-block">@include('admin.layout.admin-sidepanel')</div>

            {{-- this is for the table inside --}}


            <div class="flex flex-col w-full gap-3">{{-- Inside wrapper --}}


                <section
                    class="flex justify-start gap-3 pl-6  py-3 overflow-x-auto bg-[#293241] w-full border-l border-t h-auto">
                    {{-- wrapper --}}
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#ee6c4d' style="width: 32px; height: 32px;"></box-icon>
                        </div>

                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-24 bg-white w-[200px] rounded-r-md border-l-[16px] border-[#EE6C4D] rounded-l-md relative">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUTHERED</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#ee6c4d'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                </section>


                <section
                    class="flex justify-start gap-3 pl-6  py-3 overflow-x-auto bg-[#293241] w-full border-l border-t h-auto">



                </section>



            </div>





























        </div>



    </div>{{-- End wrapper --}}








    <script src="{{ asset('js/animalForm.js') }}"></script>
    <script>
        logoutUser();
    </script>
</body>

</html>
{{-- <nav id="pop-up"
    class="fixed bg-white w-[300px] h-auto left-1/2 top-1/2 text-center  rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border"
    style="display: none;">
    <div class="">
        <h1 class="pt-4 text-2xl font-bold">Continue Log-out?</h1>
        <div class="py-9 flex justify-center w-full gap-6 mx-auto">
            <a href="{{ route('log-out') }}" id="alertLogout" class="bg-[#293241] w-24 text-white py-2 rounded">YES</a>
            <a href="#" id="hide-log-out" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
        </div>
    </div>
</nav> --}}
