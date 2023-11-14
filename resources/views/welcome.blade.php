<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>under develop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-[#D5DFE8] overflow-hidden">

    <div>{{-- wrapper --}}
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
        <div class="flex">

            <div id="side-panel" class="z-40 h-screen w-[55px] bg-[#293241] text-white shrink-0 shadow-2xl">
                {{-- side panel --}}
                <div class="relative">{{-- button side panel --}}
                    <button type="button"
                        class=" absolute right-[-40px] h-[40px] w-[40px] shrink-0 pt-1 items-center bg-[#293241] hover:bg-[#1b2538] rounded-r-md shadow-2xl">
                        <span id="open-icon"><box-icon name='chevrons-right' type='solid'
                                color='#ffffff'></box-icon></span>
                        <span id="close-icon" class="hidden"><box-icon name='chevrons-left' type='solid'
                                color='#ffffff'></box-icon></span>
                    </button>
                </div>

                <ul class="pt-[80px] pl-3 gap-3 grid grid-flow-">
                    <li class="space-y-4">{{-- this for icon --}}
                        <div>

                            <div class="flex justify-end"><box-icon name='home' color='#ffffff'></box-icon></div>

                        </div>
                        <div>

                            <div class="flex justify-end"><box-icon name='pencil' color='#ffffff'></box-icon></div>

                        </div>
                        <div>

                            <div class="flex justify-end"><box-icon name='list-ul' color='#ffffff'></box-icon></div>

                        </div>
                    </li>

                    <li class="space-y-4">{{-- this for text --}}

                        <div>
                            <a href="{{ route('client.overview') }}">
                                <h1
                                    class="panel-text hidden hover:bg-gray-700 max-w-max px-2 rounded-md transition-transform transform hover:scale-110">
                                    HOME</h1>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('client.animal.register') }}">
                                <h1
                                    class="panel-text hidden  hover:bg-gray-700 max-w-max px-2 rounded-md transition-transform transform hover:scale-110">
                                    REGISTER</h1>
                            </a>
                        </div>
                        <div class="w-20 ">

                            <button
                                class="panel-text dropdown-btn hidden hover:bg-gray-700 max-w-max px-2 rounded-md transition-transform transform hover:scale-110">ANIMAL</button>
                            <div class="hidden pl-5 pt-3 space-y-0">
                                <a href="" class="panel-text ">Slaughtered</a>
                                <a href="" class="panel-text">Archive</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="pt-4">
                    <hr class="mx-auto w-3/4">
                </div>

            </div> {{-- end side panel --}}

            {{-- button side panel --}}

            <div class="">
                <div class="bg-red-700 w-48 h-48 bg-blur-lg bg-opacity-20 shadow-2xl backdrop-filter backdrop-blur-lg">
                    hello</div>
            </div>
            {{-- main content --}}


        </div>

    </div>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        sidePanel();
        dropDown();
    </script>

</body>

</html>
