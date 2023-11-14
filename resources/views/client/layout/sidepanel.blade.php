<div id="side-panel" class="z-40 h-screen w-[240px] bg-[#293241] text-white shrink-0 shadow-2xl fixed">
    {{-- side panel --}}

    <div class="relative">{{-- button side panel --}}
        <button type="button"
            class=" absolute right-[-20px] h-[40px] w-[40px] shrink-0 pt-1 items-center bg-[#293241] hover:bg-[#1b2538] rounded-full shadow-2xl">
            <span id="open-icon" class="hidden"><box-icon name='chevrons-right' type='solid'
                    color='#ffffff'></box-icon></span>
            <span id="close-icon"><box-icon name='chevrons-left' type='solid' color='#ffffff'></box-icon></span>
        </button>
    </div>


    <ul class="pt-[50px] pl-3 gap-3 grid grid-flow-col">
        <li class="space-y-4">{{-- this for icon --}}
            <div>

                <div class="flex justify-end"><box-icon name='home' type='solid' color='#ffffff'></box-icon></div>

            </div>
            <div>

                <div class="flex justify-end"><box-icon name='pencil' type='solid' color='#ffffff'></box-icon></div>

            </div>
            <div>

                <div class="flex justify-end"><box-icon name='list-ul' type='solid' color='#ffffff'></box-icon></div>

            </div>
        </li>

        <li class="space-y-4">{{-- this for text --}}

            <div>
                <a href="{{ route('client.overview') }}">
                    <h1 class="panel-text   max-w-max px-2 ">
                        HOME</h1>
                </a>
            </div>
            <div>
                <a href="{{ route('client.animal.register') }}">
                    <h1 class="panel-text max-w-max px-2 ">
                        REGISTER</h1>
                </a>
            </div>
            <div class="w-20 ">

                <button class="panel-text dropdown-btn max-w-max px-2 ">ANIMAL</button>
                <div class="hidden pl-5 pt-3 space-y-0">
                    <a href="{{ route('client.animal.list.register') }}" class="panel-text ">List</a>
                    <a href="" class="panel-text">Archive</a>
                </div>
            </div>
        </li>
    </ul>

    <div class="pt-4">
        <hr class="mx-auto w-3/4">
    </div>

    <ul class="pt-4 pl-3 gap-3 grid grid-flow-col ">
        <li class="space-y-4">{{-- this for icon --}}
            <div class="">
                <div class="flex justify-end"><box-icon name='log-out' type='solid' color='#ffffff'></box-icon></div>
            </div>

        </li>

        <li class="space-y-4">{{-- this for text --}}

            <div class="w-20" id="show-log-out">
                <a href="#">
                    <h1 class="panel-text  max-w-max px-2">
                        Log-out</h1>
                </a>
            </div>

        </li>
    </ul>
    <div class="pt-4">
        <hr class="mx-auto w-3/4">
    </div>

</div> {{-- end side panel --}}



<script src="{{ asset('js/slaughterhouse.js') }}"></script>
<script>
    sidePanel();
    dropDown();
    logoutUser();
</script>
