<div class="z-50 flex items-center justify-between bg-transparent h-[50px]  w-full sticky top-0">

    <div class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
        <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGH</span>TECH</h1>

    </div>



    <div class="sticky top-0">
        <div class="">
            @auth

                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                    class="flex mr-4 pr-4 items-center text-medium pe-1 font-bold  text-gray-700 rounded-full hover:text-blue-600 md:me-0"
                    type="button">
                    {{-- <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
         
                    <span class="sr-only">Open user menu</span>
                    {{-- <img class="w-8 h-8 me-2 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo"> --}}
                    {{ auth()->user()->first_name }}

                </button>

                <div id="dropdownAvatarName"
                    class="z-50 transition-all hidden bg-white mx-auto rounded-lg shadow-2xl text-xl w-44 m-4 transform  -translate-x-[94px]         ">
                    <div class="px-4 py-3 text-lg  text-gray-900 border-b ">
                        <div class="font-medium capitalize ">{{ auth()->user()->role }}</div>
                        <div class="truncate">{{ auth()->user()->email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 "
                        aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.create.account') }}"
                                class="block px-4 py-2 hover:bg-gray-100 ">Register Account</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('scan.qr') }}" class="block px-4 py-2 hover:bg-gray-100 ">Scan Qr</a>
                        </li>
                    </ul>
                    <div class="py-2 z-40 border-t">

                        <button data-modal-target="log-out-modal" data-modal-toggle="log-out-modal"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " type="button">
                            Sign out
                        </button>
                    </div>
                </div>

            @endauth
        </div>

        <nav id="toggle-settings"
            class=" space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
            <a href="#" class="px-6 w-36 gap-2 flex font-bold"><box-icon name='user-circle'></box-icon>profile</a>
            <a id="pop-logout" class="hover:cursor-pointer px-6 w-36 gap-2 flex font-bold"><box-icon
                    name='log-out'></box-icon>log-out</a>
        </nav>
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
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
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
