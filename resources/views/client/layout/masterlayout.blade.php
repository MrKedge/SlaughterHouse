<div class="antialiased bg-transparent text-medium text-sm ">
    <nav class="bg-transparent fixed left-0 right-0 top-0 z-50">{{-- header --}}
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-center font-bold w-[239px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <div class="flex justify-start items-center">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100  focus:ring-2 focus:ring-gray-100 ">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>

                    <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGH</span>TECH</h1>
                </div>
                {{-- next to logo --}}
            </div>
            <div class="flex items-center lg:order-2">
                <button type="button" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation"
                    class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100  focus:ring-gray-300">
                    <span class="sr-only">Toggle search</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg>
                </button>
                <!-- Notifications -->
                <button type="button" data-dropdown-toggle="notification-dropdown"
                    class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100  focus:ring-4 focus:ring-gray-300 ">
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg  "
                    id="notification-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
                        Notifications
                    </div>
                    <div>
                        {{-- <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                            <div class="flex-shrink-0">
                                <img class="w-11 h-11 rounded-full"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                    alt="Bonnie Green avatar" />
                                <div
                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 ">
                                    <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                        </path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                    New message from
                                    <span class="font-semibold text-gray-900 ">Bonnie Green</span>: "Hey,
                                    what's up? All set for the presentation?"
                                </div>
                                <div class="text-xs font-medium text-primary-600">
                                    a few moments ago
                                </div>
                            </div>
                        </a> --}}


                    </div>
                    <a href="#"
                        class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 ">
                        <div class="inline-flex items-center">
                            <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 " fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
                <!-- Apps -->

                <!-- Dropdown menu -->
                <button type="button"
                    class="flex mr-4 pr-4 items-center text-medium pe-1 font-bold  text-gray-700 hover:text-blue-600 md:me-0"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    @auth
                        {{ auth()->user()->first_name }}
                    @endauth

                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow "
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900 ">Neil Sims</span>
                        <span class="block text-sm text-gray-900 truncate ">name@flowbite.com</span>
                    </div>
                    <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 ">My
                                profile</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 ">Account
                                settings</a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 "><svg
                                    class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                My likes</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 "><svg
                                    class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                    </path>
                                </svg>
                                Collections</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 ">
                                <span class="flex items-center">
                                    <svg aria-hidden="true" class="mr-2 w-5 h-5 text-primary-600 " fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Pro version
                                </span>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                        <li>
                            <button data-modal-target="logout-modal" data-modal-toggle="logout-modal" type="button"
                                class="block py-2 px-4 text-sm hover:bg-gray-100 ">Sign
                                out
                            </button>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->

    <aside
        class="fixed top-0 left-0 z-40 w-[240px] h-screen pt-14 transition-transform -translate-x-full bg-[#293241] border-r border-gray-200 md:translate-x-0"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-[#293241] ">

            <ul class="space-y-2 text-white">
                <li>
                    <div class="panel-text pt-6 pb-6 border-white flex justify-center items-center">
                        <a href="{{ route('client.animal.register') }}">
                            <div
                                class="flex items-center whitespace-nowrap text-white bg-gray-700 px-4 rounded-2xl py-2">
                                <box-icon name='file-plus' type='solid' color='#ffffff' size='64px'></box-icon>
                                Add Animal
                            </div>
                        </a>
                    </div>
                </li>
                <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md w-full">{{-- this for icon --}}
                    <a href="{{ route('client.overview') }}">
                        <div class="flex items-center panel-text gap-2"><box-icon name='home' type='solid'
                                color='#ffffff'></box-icon><span class=" items-center">Home</span>
                        </div>
                    </a>
                </li>
                <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md transition-opacity duration-500">
                    {{-- this for icon --}}
                    <a href="{{ route('client.drafts') }}">
                        <div class="flex items-center panel-text gap-2"><box-icon name='pencil' type='solid'
                                color='#ffffff'></box-icon><span class=" flex items-center">Register Animal</span>
                        </div>
                    </a>
                </li>
                <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                    <a href="{{ route('client.animal.list.register') }}">
                        <div class="flex items-center panel-text gap-2"><box-icon name='data' type='solid'
                                color='#ffffff'></box-icon><span
                                class=" flex items-center whitespace-nowrap">Registration
                                List</span>
                        </div>
                    </a>
                </li>
                {{-- <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">

                <a href="{{ route('client.approve.list') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bxs-check-circle'
                            style='font-size: 24px;'></i>
                        <span class=" flex items-center">Approved</span>
                    </div>
                </a>
                </li> --}}
                {{-- <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">

                    <a href="{{ route('client.schedule.list') }}">
                        <div class="flex items-center panel-text gap-2"><i class='bx bx-calendar'
                                style='font-size: 24px; color: #ffffff;'></i>
                            <span class=" flex items-center">Schedule</span>
                        </div>
                    </a>
                </li> --}}
                {{-- 
                <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">

                    <a href="{{ route('client.slaughter.list') }}">
                        <div class="flex items-center panel-text gap-2"><i class='bx bx-cart-download'
                                style='font-size: 24px; color: #ffffff;'></i>
                            <span class=" flex items-center">Slaughtered</span>
                        </div>
                    </a>
                </li> --}}

                <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                    <a href="{{ route('client.archive.list') }}">
                        <div class="flex items-center panel-text gap-2"><box-icon name='archive-in' type='solid'
                                color='#ffffff'></box-icon>
                            <span class=" flex items-center">Archive</span>
                        </div>
                    </a>
                </li>

                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 ">
                    <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                        <a href="{{ route('client.stub') }}">
                            <div class="flex items-center panel-text gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>

                                <span class=" flex items-center">Receipt</span>
                            </div>
                        </a>
                    </li>
                </ul>
        </div>

    </aside>

    <main class="md:ml-60 h-auto pt-10">


        @yield('content')


    </main>
</div>


<div id="logout-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="logout-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to log
                    out?</h3>
                <a href="{{ route('log-out') }}" data-modal-hide="logout-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                </a>
                <button data-modal-hide="logout-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>
