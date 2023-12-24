<button id="toggleButton" class="fixed z-40 top-0 pt-1">
    <span id="open-sidepanel" class=""><i class='bx bx-menu' style='font-size: 40px; color: #ffffff;'></i></span>
</button>
<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl inline-block">
    {{-- side panel --}}

    {{-- <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1> --}}

    <div class="flex">
        <ul class="pt-[60px] grid grid-flow-row w-full px-2 space-y-5">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md w-full">{{-- this for icon --}}
                <a href="{{ route('inspector.overview') }}">
                    <div class="flex items-center panel-text gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class=" items-center">Home</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('inspector.antemortem.list') }}">
                    <div class="flex items-center panel-text gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <span class=" flex items-center whitespace-nowrap">Ante Mortem</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('inspector.postmortem.list') }}">
                    <div class="flex items-center panel-text gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>
                        <span class=" flex items-center whitespace-nowrap">Post Mortem</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('scan.qr') }}">
                    <div class="flex items-center panel-text gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        <span class=" flex items-center whitespace-nowrap">Disposal</span>
                    </div>
                </a>
            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <a href="{{ route('scan.qr') }}">
                    <div class="flex items-center panel-text gap-2"><i class='bx bx-scan'
                            style='font-size: 24px; color: white;'></i><span
                            class=" flex items-center whitespace-nowrap">Scan QR</span>
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
