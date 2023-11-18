<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl">
    {{-- side panel --}}

    <div class="relative">{{-- button side panel --}}
        <button type="button"
            class=" absolute right-[-17.5px] top-[40px] h-[35px] w-[35px] pt-1 bg-[#293241] hover:bg-[#1b2538] rounded-full border">
            <span id="open-icon" class="hidden"><box-icon name='chevrons-right' type='solid'
                    color='#ffffff'></box-icon></span>
            <span id="close-icon"><box-icon name='chevrons-left' type='solid' color='#ffffff'></box-icon></span>
        </button>
    </div>



    <div class="flex justify-start pl-6">
        <ul class="pt-[70px] grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='dashboard' type='solid'
                            color='#ffffff'></box-icon></box-icon>
                    </div>


                </div>

                <a href="{{ route('admin.dashboard') }}">
                    <h1 class="panel-text flex items-center">DASHBOARD</h1>
                </a>

            </li>


        </ul>

    </div>


    <p class="pl-3 text-gray-500 pt-4">REGISTRATION</p>


    <div class="flex justify-start pl-6">
        <ul class="pt-4 grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='pencil' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('admin.view.animal.reg.list') }}">
                    <h1 class="panel-text flex items-center">REGISTER LIST</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='list-ul' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center whitespace-nowrap">ANIMAL</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='user-circle' type='solid'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center whitespace-nowrap">OWNER</h1>
                </a>

            </li>

        </ul>

    </div>
    <p class="pl-3 text-gray-500 pt-4">REPORTS</p>


    <div class="flex justify-start pl-6">
        <ul class="pt-4 grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='report' type='solid' flip='horizontal'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center">LRME</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='report' type='solid' flip='horizontal'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center">SSHPDP</h1>
                </a>

            </li>

        </ul>

    </div>


    <p class="pl-3 text-gray-500 pt-4">OPTION</p>


    <div class="flex justify-start pl-6">
        <ul class="pt-4 grid grid-flow-row space-y-2">

            <li class="flex gap-4 hover:bg-[#3D5A80] p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='group' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.archive.list') }}">
                    <h1 class="panel-text flex items-center">USER ACCOUNTS</h1>
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
    logoutUser();
</script>
<script>
    dropDownDiv();
</script>
