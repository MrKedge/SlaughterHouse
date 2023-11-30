<button id="toggleButton" class="fixed z-40 top-0 pt-1">
    <span id="open-sidepanel" class=""><i class='bx bx-menu' style='font-size: 40px; color: #ffffff;'></i></span>
</button>
<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl inline-block">
    {{-- side panel --}}

    {{-- <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1> --}}

    <div class="flex">
        <ul class="pt-[60px] grid grid-flow-row w-full px-2 space-y-5">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md w-full">{{-- this for icon --}}
                <a href="{{ route('butcher.overview') }}">
                    <div class="flex items-center panel-text gap-2"><box-icon name='home' type='solid'
                            color='#ffffff'></box-icon><span class=" items-center">HOME</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}
                <a href="{{ route('butcher.animal') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-registered'
                            style='font-size: 24px; color: #ffffff;'></i><span class=" flex items-center">ANIMAL
                            LIST</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-stopwatch'
                            style='font-size: 24px; color: #ffffff;'></i><span
                            class=" flex items-center whitespace-nowrap">RECENT SLAUGHTER</span>
                    </div>
                </a>
            </li>
            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-scan'
                            style='font-size: 24px; color: white;'></i><span
                            class=" flex items-center whitespace-nowrap">SCAN ANIMAL</span>
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
