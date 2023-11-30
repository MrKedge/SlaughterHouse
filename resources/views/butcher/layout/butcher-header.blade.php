<div class="z-10 flex items-center justify-between bg-transparent h-[50px] sticky top-0">

    <div class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
        <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGH</span>TECH</h1>
    </div>
    <div class="sticky">

        @auth
            <a href="#" class="font-extrabold capitalize px-4 text-[#293241] flex items-center gap-1">
                <div id="open-icon" class=""><box-icon type='solid' name='down-arrow' size='14px'></box-icon>
                </div>
                <div id="close-icon" class="hidden"><box-icon type='solid' name='up-arrow' size='14px'></box-icon>
                </div>
                {{ auth()->user()->first_name }}
            </a>
        @endauth
        <nav id="toggle-settings"
            class=" space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
            <a href="#" class="px-6 w-36 gap-2 flex font-bold"><box-icon name='user-circle'></box-icon>profile</a>
            <a id="pop-logout" class="hover:cursor-pointer px-6 w-36 gap-2 flex font-bold"><box-icon
                    name='log-out'></box-icon>log-out</a>
        </nav>
    </div>
</div>



<nav id="pop-up" class="hidden">
    <div
        class=" absolute top-1/2  right-1/3 z-40  bg-white w-[300px] h-auto text-center  rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border">
        <h1 class="pt-4 text-2xl font-bold">Continue Log-out?</h1>
        <div class="py-9 flex justify-center w-full gap-6 mx-auto">
            <a href="{{ route('log-out') }}" id="alertLogout" class="bg-[#293241] w-24 text-white py-2 rounded">YES</a>
            <a href="#" id="hide-log-out" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
        </div>
    </div>
</nav>





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
