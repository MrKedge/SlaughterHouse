<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl">
    {{-- side panel --}}


    <div class="flex p-3 pt-[50px]">
        <ul class=" grid grid-flow-row space-y-2 w-full">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

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


    <p class="pl-3 text-gray-500 ">REGISTRATION</p>


    <div class="flex p-3">
        <ul class=" grid grid-flow-row space-y-2 w-full">



            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bx-check-circle' style='font-size: 24px;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.view.animal.reg.list') }}">
                    <h1 class="panel-text flex items-center">FOR APPROVAL</h1>
                </a>

            </li>

            <li class="group relative ">{{-- this for icon --}}

                <button
                    class="flex justify-between items-center w-full panel-text hover:bg-gray-700 p-2 rounded-md group">
                    <div class="flex items-center justify-start gap-4">
                        <i class='bx bx-registered' style='color: #ffffff; font-size: 24px;'></i>ON PROCESS
                    </div>
                    <i class='arrow bx bxs-chevron-right transform transition-transform duration-300'
                        style='color:#ffffff'></i>
                </button>

                <div class="transition-all duration-300 overflow-hidden opacity-0 max-h-0 ">
                    <ul class="">
                        <li><a href="{{ route('admin.approve.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">APPROVE</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.monitor.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">ANTE MORTEM</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.schedule.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">SCHEDULE</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.for.slaughter.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">FOR SLAUGHTER</h1>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bxs-edit' style='font-size: 24px; color: #ffffff;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.slaughter.list') }}">
                    <h1 class="panel-text flex items-center">SLAUGHTERED</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bx-user-circle'
                            style='color: #ffffff; font-size: 24px;'></i>
                    </div>


                </div>

                <a href="{{ route('owner.list') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">OWNER</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bxs-edit' style='font-size: 24px; color: #ffffff;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.form.maintenance') }}">
                    <h1 class="panel-text flex items-center">MAINTENANANCE</h1>
                </a>

            </li>

        </ul>

    </div>
    <p class="pl-3 text-gray-500 ">REPORTS</p>


    <div class="flex p-3">
        <ul class="grid grid-flow-row space-y-2 w-full">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='report' type='solid' flip='horizontal'
                            color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center">LRME</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

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


    <p class="pl-3 text-gray-500 ">OPTION</p>


    <div class="flex p-3">
        <ul class=" grid grid-flow-row space-y-2 w-full">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><box-icon name='group' type='solid' color='#ffffff'></box-icon>
                    </div>


                </div>

                <a href="">
                    <h1 class="panel-text flex items-center">USER ACCOUNTS</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bx-scan text-[24px] font-medium'></i>
                    </div>


                </div>

                <a href="{{ route('scan.qr') }}">
                    <h1>SCAN QR</h1>
                </a>

            </li>
        </ul>
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
                const isOpen = dropdownContents[index].classList.toggle('max-h-44');

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
