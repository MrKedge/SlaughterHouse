<div class="z-50 flex items-center justify-between bg-transparent h-[50px]  w-full sticky top-0">

    <div class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
        <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGH</span>TECH</h1>

    </div>



    {{-- another box --}}
    <div class="flex items-center gap-2">
        <button type="button" data-dropdown-toggle="apps-dropdown"
            class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 focus:ring-gray-300 ">
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
            <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
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
                    <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
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
                    <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="text-sm text-gray-900 ">
                        Settings
                    </div>
                </a>
                <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 group">
                    <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 "
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
                <a href="{{ route('scan.qr') }}" class="block p-4 text-center rounded-lg hover:bg-gray-100  group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                        fill="currentColor" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 ">
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
        {{-- fix --}}

        <button type="button"
            class="flex mr-4 pr-4 items-center text-medium pe-1 font-bold  text-gray-700 hover:text-blue-600 md:me-0"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
            <span class="sr-only">Open user menu</span>
            {{ auth()->user()->first_name }}
        </button>
        <!-- Dropdown menu -->
        <div class="hidden z-50 my-4 w-56 text-base list-none bg-white  divide-y divide-gray-100 shadow rounded-xl"
            id="dropdown">
            @auth
                <div class="py-3 px-4">
                    <span class="block text-sm font-semibold text-gray-900 ">
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                    <span class="block text-sm text-gray-900 truncate ">{{ auth()->user()->email }}</span>
                </div>
            @endauth
            <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                <li>
                    <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Account
                        settings</a>
                </li>
            </ul>
            <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
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
                    <a href="#" class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100">
                        <span class="flex items-center">
                            <svg aria-hidden="true" class="mr-2 w-5 h-5 text-primary-600" fill="currentColor"
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
            <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                <li>
                    <button data-modal-target="log-out-modal" data-modal-toggle="log-out-modal"
                        class="block w-full text-left py-2 px-4 text-sm hover:bg-gray-100">Sign
                        out
                    </button>
                </li>
            </ul>

            {{-- add another box --}}
            <div class="sticky top-0">
                <div class="">






                </div>

                <nav id="toggle-settings"
                    class=" space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
                    <a href="#" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='user-circle'></box-icon>profile</a>
                    <a id="pop-logout" class="hover:cursor-pointer px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='log-out'></box-icon>log-out</a>
                </nav>
            </div>
        </div>
    </div>



</div>
{{-- end header --}}

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





{{-- scripts --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var openIcon = document.getElementById("open-icon");
        var closeIcon = document.getElementById("close-icon");
        var popNav = document.getElementById("toggle-settings");

        openIcon.addEventListener("click", function() {
            openIcon.classList.add("hidden");
            closeIcon.classList.remove("hidden");
            popNav.classList.remove("hidden");
        });

        closeIcon.addEventListener("click", function() {
            openIcon.classList.remove("hidden");
            closeIcon.classList.add("hidden");
            popNav.classList.add("hidden");
        });
    });



    document.addEventListener("DOMContentLoaded", function() {
        var showLogout = document.getElementById("pop-logout");
        var hideLogout = document.getElementById("hide-log-out");
        var logoutPopUp = document.getElementById("pop-up");

        showLogout.addEventListener("click", function() {
            logoutPopUp.classList.remove("hidden");
        });

        hideLogout.addEventListener("click", function() {
            logoutPopUp.classList.add("hidden");
        });
    });
</script>
