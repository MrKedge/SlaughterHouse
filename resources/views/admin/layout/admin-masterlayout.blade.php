<div class="antialiased bg-transparent text-medium text-sm ">
    <nav class="bg-white shadow-lg fixed left-0 right-0 top-0 z-50">{{-- header --}}
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-center font-bold w-[239px] h-[50px] flex flex-wrap justify-between items-center text-xl">
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


                    <h1
                        class="font-exo2 tracking-wide  text-white bg-gray-600 rounded-lg p-1 px-2 hidden lg:block ml-10">
                        <span class="text-[#EE6C4D] ">Slaugh</span>tech
                    </h1>
                </div>
            </div>

            <div class="flex items-center lg:order-2">

                <!-- Notifications -->
                <button type="button" data-dropdown-toggle="notification-dropdown"
                    class="p-2 mr-1 text-[#38419D] rounded-lg hover:text-blue-700 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 ">
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
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg"
                    id="notification-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-[#38419D] bg-gray-50 ">
                        Notifications
                    </div>
                    <div>


                        {{-- <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                            <div class="flex-shrink-0">
                                <img class="w-11 h-11 rounded-full"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                                    alt="Joseph McFall avatar" />
                                <div
                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white ">
                                    <svg aria-hidden="true" class="w-3 h-3 text-gray-600" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                    <span class="font-semibold text-gray-900 ">Joseph Mcfall</span>
                                    and
                                    <span class="font-medium text-gray-900 ">141 others</span>
                                    love your story. See it and view more stories.
                                </div>
                                <div class="text-xs font-medium text-primary-600 ">
                                    44 minutes ago
                                </div>
                            </div>
                        </a> --}}
                        @forelse ($adminUser->notifications as $notification)
                            <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100 ">
                                <div class="flex-shrink-0 text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                </div>
                                <div class="pl-3 w-full">
                                    <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                        New register
                                        <span
                                            class="font-semibold text-gray-900 ">{{ isset($notification->data['type']) ? $notification->data['type'] : 'Unknown Type' }}</span>
                                        from
                                        {{ isset($notification->data['user_name']) ? $notification->data['user_name'] : 'Unknown User' }}.
                                    </div>
                                    <div class="text-xs font-medium text-primary-600">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>

                        @empty
                            <span class="text-xs font-medium text-primary-600">No new notification</span>
                        @endforelse
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
                <button type="button" data-dropdown-toggle="apps-dropdown"
                    class="p-2 text-[#38419D] rounded-lg hover:text-blue-700 hover:bg-gray-100 focus:ring-gray-300 ">
                    <span class="sr-only">View notifications</span>
                    <!-- Icon -->
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white divide-y divide-gray-100 shadow-lg rounded-xl"
                    id="apps-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-[#38419D] bg-gray-50 ">
                        Slaughtech
                    </div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <a href="{{ route('admin.create.account') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
                                <path
                                    d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                            </svg>


                            <div class="text-sm text-gray-900 ">Add User</div>
                        </a>
                        <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
                            <svg aria-hidden="true"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                            <div class="text-sm text-gray-900 ">Users</div>
                        </a>
                        <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div class="text-sm text-gray-900 ">Owners</div>
                        </a>
                        <a href="{{ route('admin.register.animal') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor"class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path
                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>

                            <div class="text-sm text-gray-900 whitespace-nowrap ">
                                Register
                            </div>
                        </a>
                        <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 ">
                            <svg aria-hidden="true"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-sm text-gray-900 ">
                                Settings
                            </div>
                        </a>
                        <a href="{{ route('archive.list') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
                            <svg aria-hidden="true"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                <path fill-rule="evenodd"
                                    d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-sm text-gray-900 ">
                                Archives
                            </div>
                        </a>
                        <a href="{{ route('scan.qr') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100  group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                fill="currentColor"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
                                <path
                                    d="M3 4v5h2V5h4V3H4a1 1 0 0 0-1 1zm18 5V4a1 1 0 0 0-1-1h-5v2h4v4h2zm-2 10h-4v2h5a1 1 0 0 0 1-1v-5h-2v4zM9 21v-2H5v-4H3v5a1 1 0 0 0 1 1h5zM2 11h20v2H2z">
                                </path>
                            </svg>

                            <div class="text-sm text-gray-900 ">
                                Qr Scanner
                            </div>
                        </a>
                        <a href="{{ route('admin.form.maintenance') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
                                <path fill-rule="evenodd"
                                    d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                                <path fill-rule="evenodd"
                                    d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div class="text-sm text-gray-900 ">
                                Maintenance
                            </div>
                        </a>
                    </div>
                </div>
                <button type="button"
                    class="flex mr-4 pr-4 items-center text-medium pe-1 font-bold  text-[#38419D] hover:text-blue-600 md:me-0"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    {{ auth()->user()->first_name }}
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white  divide-y divide-gray-100 shadow rounded-xl"
                    id="dropdown">
                    @auth
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-[gray-900] ">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                            <span class="block text-sm text-gray-900 truncate ">{{ auth()->user()->email }}</span>
                        </div>
                    @endauth
                    <ul class="py-1 text-[#38419D] " aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Account
                                settings</a>
                        </li>
                    </ul>
                    <ul class="py-1 text-[#38419D] " aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100"><svg
                                    class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Ratings</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-sm hover:bg-gray-100"><svg
                                    class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                    </path>
                                </svg>
                                Documents</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100">
                                <span class="flex items-center">
                                    <svg aria-hidden="true" class="mr-2 w-5 h-5 text-primary-600" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Role
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
                    <ul class="py-1 text-[#38419D]" aria-labelledby="dropdown">
                        <li>
                            <button data-modal-target="log-out-modal" data-modal-toggle="log-out-modal"
                                class="block w-full text-left py-2 px-4 text-sm hover:bg-gray-100 rounded-b-lg">Sign
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
        class="fixed top-0 left-0 z-40 w-[240px] h-screen pt-14 transition-transform -translate-x-full bg-[#ffffff] border-r border-gray-300 md:translate-x-0"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="scrollbar-gutter overflow-y-auto py-5 px-3 h-full bg-[#ffffff] font-semibold ">
            <ul class="space-y-2 pt-6 text-gray-600">
                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}
                    <a href="{{ route('admin.dashboard') }}">

                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <h1 class="panel-text flex items-center">Dashboard</h1>
                        </div>
                    </a>

                </li>
            </ul>
            <p class="py-3 text-gray-400 ">REGISTRATION</p>
            <ul class="space-y-2 text-gray-600">
                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('admin.view.animal.reg.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}

                    <a href="{{ route('admin.view.animal.reg.list') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h1 class="panel-text flex items-center">For Approval</h1>
                        </div>
                    </a>

                </li>

                <li class="group relative ">{{-- this for icon --}}

                    <button
                        class="flex justify-between items-center w-full panel-text p-2 rounded-md group {{ request()->routeIs(['admin.approve.list', 'admin.monitor.list', 'admin.schedule.list', 'admin.for.slaughter.list', 'admin.slaughter.list', 'admin.postmortem.list']) ? 'text-[#38419D] ' : 'hover:bg-gray-200' }}">
                        <div class="flex items-center justify-start gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            On Process
                        </div>
                        <i class='arrow bx bxs-chevron-right transform transition-transform duration-300'
                            style='color:#2a2b31'></i>
                    </button>

                    <div class="transition-all duration-300 overflow-hidden opacity-0 max-h-0 ">
                        <ul class="">
                            <li><a href="{{ route('admin.approve.list') }}">
                                    <h1
                                        class=" py-2 rounded-md pl-8 my-1 {{ request()->routeIs('admin.approve.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        Approved</h1>
                                </a>
                            </li>
                            <li><a href="{{ route('admin.monitor.list') }}">
                                    <h1
                                        class=" py-2 rounded-md pl-8 mb-1 {{ request()->routeIs('admin.monitor.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        Ante Mortem</h1>
                                </a>
                            </li>
                            <li><a href="{{ route('admin.schedule.list') }}">
                                    <h1
                                        class=" py-2 rounded-md pl-8 mb-1  {{ request()->routeIs('admin.schedule.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        Schedule</h1>
                                </a>
                            </li>
                            <li><a href="{{ route('admin.for.slaughter.list') }} ">
                                    <h1
                                        class=" py-2 rounded-md pl-8 mb-1 {{ request()->routeIs('admin.for.slaughter.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        For Slaughter</h1>
                                </a>
                            </li>
                            <li><a href="{{ route('admin.slaughter.list') }}">
                                    <h1
                                        class=" py-2 rounded-md pl-8 mb-1 {{ request()->routeIs('admin.slaughter.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        Slaughtered</h1>
                                </a>
                            </li>
                            <li><a href="{{ route('admin.postmortem.list') }}">
                                    <h1
                                        class=" py-2 rounded-md pl-8 mb-1 {{ request()->routeIs('admin.postmortem.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                                        Post Mortem</h1>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>


                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('issuing.stub') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}


                    <a href="{{ route('issuing.stub') }} ">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <h1 class="panel-text flex items-center whitespace-nowrap">Stub</h1>
                        </div>
                    </a>
                </li>
                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('scheduled.queue') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}

                    <a href="{{ route('scheduled.queue') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>

                            <h1 class="panel-text flex items-center whitespace-nowrap">Scheduled Queue</h1>
                        </div>
                    </a>
                </li>
                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('complete.animals') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}

                    <a href="{{ route('complete.animals') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <h1 class="panel-text flex items-center whitespace-nowrap">Completed</h1>
                        </div>
                    </a>
                </li>
                <li
                    class="flex gap-4  p-2 rounded-md  {{ request()->routeIs('invalid.receipt') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}
                    <a href="{{ route('invalid.receipt') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                            </svg>

                            <h1 class="panel-text flex items-center">Invalid Receipt</h1>
                        </div>
                    </a>

                </li>
                <li
                    class="flex gap-4  p-2 rounded-md  {{ request()->routeIs('admin.dispose.list') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}
                    <a href="{{ route('admin.dispose.list') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <h1 class="panel-text flex items-center">Disposal</h1>
                        </div>
                    </a>

                </li>
            </ul>
            <p class="py-3 text-gray-400 ">REPORTS</p>
            <ul class="space-y-2 text-gray-600">
                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('lrme.reports') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}

                    <a href="{{ route('lrme.reports') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                            </svg>
                            <h1 class="panel-text flex items-center">LRME</h1>
                        </div>
                    </a>

                </li>

                <li
                    class="flex gap-4  p-2 rounded-md {{ request()->routeIs('sshpdp.reports') ? 'text-[#38419D] bg-gray-200 hover-none' : 'hover:bg-gray-200' }}">
                    {{-- this for icon --}}

                    <a href="{{ route('sshpdp.reports') }}">
                        <div class="flex gap-4 items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            <h1 class="panel-text flex items-center">SSHPDP</h1>
                        </div>
                    </a>

                </li>

            </ul>

        </div>

    </aside>
    <div>
        @include('alerts.error')
        @include('alerts.success')
    </div>
    <main class="md:ml-60 h-auto pt-10">

        @yield('admincontent')

    </main>
</div>


<div id="log-out-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="log-out-modal">
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
                <a href="{{ route('log-out') }}" data-modal-hide="log-out-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                </a>
                <button data-modal-hide="log-out-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownTriggers = document.querySelectorAll('.group button');
        const dropdownContents = document.querySelectorAll('.group > .transition-all');
        const arrowIcons = document.querySelectorAll('.group i.arrow');

        dropdownTriggers.forEach((trigger, index) => {
            trigger.addEventListener('click', function() {
                // Toggle the open/closed state
                const isOpen = dropdownContents[index].classList.toggle('max-h-60');

                // Toggle additional classes based on the open/closed state
                dropdownContents[index].classList.toggle('opacity-100', isOpen);
                dropdownContents[index].classList.toggle('opacity-0', !isOpen);
                arrowIcons[index].classList.toggle('rotate-90', isOpen);
                trigger.classList.toggle('active',
                    isOpen); // Add or remove 'active' class to the button
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
