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
                    <h1 class="panel-text flex items-center">For Approval</h1>
                </a>

            </li>

            <li class="group relative ">{{-- this for icon --}}

                <button
                    class="flex justify-between items-center w-full panel-text hover:bg-gray-700 p-2 rounded-md group">
                    <div class="flex items-center justify-start gap-4">
                        <i class='bx bx-registered' style='color: #ffffff; font-size: 24px;'></i>On Process
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
                    </ul>
                </div>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bxs-edit' style='font-size: 24px; color: #ffffff;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.slaughter.list') }}">
                    <h1 class="panel-text flex items-center">Slaughtered</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bxs-trash' style='color: #ffffff; font-size: 24px;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.dispose.list') }}">
                    <h1 class="panel-text flex items-center">Disposal</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bx-user-circle'
                            style='color: #ffffff; font-size: 24px;'></i>
                    </div>


                </div>

                <a href="{{ route('owner.list') }}">
                    <h1 class="panel-text flex items-center whitespace-nowrap">Owner</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bxs-edit' style='font-size: 24px; color: #ffffff;'></i>
                    </div>


                </div>

                <a href="{{ route('admin.form.maintenance') }}">
                    <h1 class="panel-text flex items-center">Maintenance</h1>
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

                <a href="{{ route('admin.create.account') }}">
                    <h1 class="panel-text flex items-center">Register Account</h1>
                </a>

            </li>

            <li class="flex gap-4 hover:bg-gray-700 p-2 rounded-md">{{-- this for icon --}}

                <div>
                    <div class="flex items-center"><i class='bx bx-scan text-[24px] font-medium'></i>
                    </div>


                </div>

                <a href="{{ route('scan.qr') }}">
                    <h1>Scan QR</h1>
                </a>

            </li>
        </ul>
    </div>
</div>

<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                            Description</label>
                        <textarea id="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new product
                </button>
            </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
