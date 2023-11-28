<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl inline-block transition-width">
    {{-- side panel --}}

    {{-- <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1> --}}

    <div class="relative">{{-- button side panel --}}
        <button id="toggleButton" class="absolute pt-1 bg-[#293241] hover:bg-[#1b2538]">
            <span id="open-sidepanel" class=""><i class='bx bx-menu' style='font-size: 40px;'></i></span>
        </button>
    </div>


    <div class="flex justify-center">

        <ul class="pt-[70px] grid grid-flow-row space-y-2">

            <li class="flex gap-4 pl-6 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='home' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.overview') }}">
                    <h1 class="panel-text items-center">HOME</h1>
                </a>

            </li>

            <li class="flex gap-4 pl-6 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='pencil' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.drafts') }}">
                    <h1 class="panel-text flex items-center">REGISTER ANIMAL</h1>
                </a>

            </li>

            <li class="flex gap-4 pl-6 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='list-ul' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.animal.list.register') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">REGISTRATION LIST</h1>
                </a>

            </li>

            <li class="flex gap-4 pl-6 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='archive-in' type='solid'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="{{ route('client.archive.list') }}">
                    <h1 class="panel-text flex items-center">ARCHIVE</h1>
                </a>

            </li>
        </ul>

    </div>

    <div class="flex justify-center">

    </div>
    {{-- <div class="pt-4">
        <hr class="mx-auto w-3/4">
    </div> --}}
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButton = document.getElementById("toggleButton");
        var sidePanel = document.getElementById("side-panel");
        var panelText = document.querySelectorAll('.panel-text');

        toggleButton.addEventListener("click", function() {

            openPanel.classList.toggle("hidden");
            closePanel.classList.toggle("hidden");

            // Iterate through each element in the panelText NodeList
            panelText.forEach(function(element) {
                element.classList.toggle("hidden");
            });

            // Toggle the width of the side panel with transition
            sidePanel.style.width = sidePanel.style.width === "55px" ? "240px" : "55px";

            // Add transition effect to the elements with the "hidden" class
            panelText.forEach(function(element) {
                element.style.transition = "opacity 1s ease-in-out";
            });
        });
    });
</script>
