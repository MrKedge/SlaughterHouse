<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl inline-block">
    {{-- side panel --}}

    <div class="relative">{{-- button side panel --}}
        <button type="button"
            class=" absolute right-[-17.5px] top-[40px] h-[35px] w-[35px] pt-1 bg-[#293241] hover:bg-[#1b2538] rounded-full border">
            <span id="open-icon" class="hidden"><box-icon name='chevrons-right' type='solid'
                    color='#ffffff'></box-icon></span>
            <span id="close-icon"><box-icon name='chevrons-left' type='solid' color='#ffffff'></box-icon></span>
        </button>
    </div>


    <div class="flex justify-center">
        <ul class="pt-[70px] grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='home' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.overview') }}">
                    <h1 class="panel-text flex items-center">HOME</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='pencil' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.animal.register') }}">
                    <h1 class="panel-text flex items-center">REGISTER ANIMAL</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='list-ul' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.animal.list.register') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">REGISTRATION LIST</h1>
                </a>

            </li>
        </ul>

    </div>


    <div class="pt-4">
        <hr class="mx-auto w-3/4">
    </div>

    <div class="flex justify-center">
        <ul class="pt-4 grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='archive-in' type='solid'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.archive.list') }}">
                    <h1 class="panel-text flex items-center">ARCHIVE</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='save' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center">DRAFTS</h1>
                </a>

            </li>

        </ul>

    </div>
    <div class="pt-4">
        <hr class="mx-auto w-3/4">
    </div>
</div>



<script src="{{ asset('js/slaughterhouse.js') }}"></script>


<script>
    sidePanel();
</script>
<script>
    logoutUser();
</script>
<script>
    dropDownDiv();
</script>
