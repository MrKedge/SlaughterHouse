<button id="toggleButton" class="fixed z-40 top-0 pt-1">
    <span id="open-sidepanel" class=""><i class='bx bx-menu' style='font-size: 40px; color: #ffffff;'></i></span>
</button>
<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl inline-block">
    {{-- side panel --}}

    {{-- <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1> --}}

    <div class="panel-text pt-6 pb-6 border-white flex justify-center items-center">
        <a href="{{ route('client.animal.register') }}">
            <div class="flex items-center whitespace-nowrap text-white bg-gray-700 px-4 rounded-2xl py-2"><box-icon
                    name='file-plus' type='solid' color='#ffffff' size='64px'></box-icon>
                Add Animal</div>
        </a>
    </div>
    <div class="flex">
        <ul class="pt-[20px] grid grid-flow-row w-full px-2 space-y-5">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md w-full">{{-- this for icon --}}
                <a href="{{ route('client.overview') }}">
                    <div class="flex items-center panel-text gap-2"><box-icon name='home' type='solid'
                            color='#ffffff'></box-icon><span class=" items-center">HOME</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}
                <a href="{{ route('client.drafts') }}">
                    <div class="flex items-center panel-text gap-2"><box-icon name='pencil' type='solid'
                            color='#ffffff'></box-icon><span class=" flex items-center">REGISTER ANIMAL</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('client.animal.list.register') }}">
                    <div class="flex items-center panel-text gap-2"><box-icon name='data' type='solid'
                            color='#ffffff'></box-icon><span class=" flex items-center whitespace-nowrap">REGISTRATION
                            LIST</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('client.approve.list') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bxs-check-circle'
                            style='font-size: 24px;'></i>
                        <span class=" flex items-center">APPROVED</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('client.schedule.list') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-calendar'
                            style='font-size: 24px; color: #ffffff;'></i>
                        <span class=" flex items-center">SCHEDULE</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('client.slaughter.list') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-cart-download'
                            style='font-size: 24px; color: #ffffff;'></i>
                        <span class=" flex items-center">SLAUGHTERED</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('client.archive.list') }}">
                    <div class="flex items-center panel-text gap-2"><box-icon name='archive-in' type='solid'
                            color='#ffffff'></box-icon>
                        <span class=" flex items-center">ARCHIVE</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButton = document.getElementById("toggleButton");
        var sidePanel = document.getElementById("side-panel");
        var panelText = document.querySelectorAll('.panel-text');

        toggleButton.addEventListener("click", function() {
            sidePanel.style.width = sidePanel.style.width === "0px" ? "240px" : "0px";

            // Toggle the visibility of the elements with the "panel-text" class
            panelText.forEach(function(element) {
                element.classList.toggle("hidden");
            });
            sidePanel.style.transition = "width 0.3s ease-in-out";
        });
    });
</script>
