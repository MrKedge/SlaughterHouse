<div id="side-panel" class="h-screen w-[240px] bg-[#293241] text-white shadow-2xl">
    {{-- side panel --}}


    <div class="flex p-3 pt-[50px]">
        <ul class=" grid grid-flow-row space-y-2 w-full">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

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
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </div>


                </div>

                <a href="{{ route('admin.view.animal.reg.list') }}">
                    <h1 class="panel-text flex items-center">For Approval</h1>
                </a>

            </li>

            <li class="group relative ">{{-- this for icon --}}

                <button
                    class="flex justify-between items-center w-full panel-text hover:bg-gray-700 p-2 rounded-md group">
                    <div class="flex items-center justify-start gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        On Process
                    </div>
                    <i class='arrow bx bxs-chevron-right transform transition-transform duration-300'
                        style='color:#ffffff'></i>
                </button>

                <div class="transition-all duration-300 overflow-hidden opacity-0 max-h-0 ">
                    <ul class="">
                        <li><a href="{{ route('admin.approve.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">Approve</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.monitor.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">Ante Mortem</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.schedule.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">Schedule</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.for.slaughter.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">For Slaughter</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.slaughter.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">Slaughtered</h1>
                            </a>
                        </li>
                        <li><a href="{{ route('admin.postmortem.list') }}">
                                <h1 class="hover:bg-gray-700 py-2 rounded-md pl-8">Post Mortem</h1>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>


            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>

                    </div>


                </div>

                <a href="{{ route('issuing.stab') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">Stab</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                        </svg>



                    </div>


                </div>

                <a href="{{ route('issuing.stab') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">Mic</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>


                    </div>


                </div>

                <a href="{{ route('issuing.stab') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">Completed</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </div>


                </div>

                <a href="{{ route('admin.dispose.list') }}">
                    <h1 class="panel-text flex items-center">Disposal</h1>
                </a>

            </li>

        </ul>

    </div>
    <p class="pl-3 text-gray-500 ">REPORTS</p>


    <div class="flex p-3">
        <ul class="grid grid-flow-row space-y-2 w-full">

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                        </svg>

                    </div>


                </div>

                <a href="{{ route('lrme.reports') }}">
                    <h1 class="panel-text flex items-center">LRME</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                        </svg>

                    </div>


                </div>

                <a href="{{ route('sshpdp.reports') }}">
                    <h1 class="panel-text flex items-center">SSHPDP</h1>
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
