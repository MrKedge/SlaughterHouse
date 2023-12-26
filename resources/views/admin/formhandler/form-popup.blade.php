{{-- SCHED POPUP --}}
<div id="schedule-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    @if (optional($animal->schedule)->scheduled_at === null)
                        Schedule of slaughter
                    @else
                        Reschedule Animal
                    @endif
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="schedule-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5 text-center">

                <form action="{{ route('set.schedule', ['id' => $animal->id]) }}" method="post">
                    @csrf

                    <div class="pb-3">

                        <div class="w-full flex gap-4">
                            <input name="dateOfSlaughter" required type="date"
                                class="w-full p-2 border font-semibold border-gray-800 rounded focus:ring-4 focus:ring-blue-900">
                            <input name="timeOfSlaughter" required type="time"
                                class="w-full p-2 border font-semibold border-gray-800 rounded focus:ring-4 focus:ring-blue-900">
                        </div>
                    </div>
                    <div>
                        <label for="cause" class="block mb-2 text-sm font-medium text-gray-900 ">Inspected
                            By:</label>
                        <input required name="examinedBy" readonly
                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                            class="cursor-not-allowed  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                            placeholder="{{ auth()->user()->firts_name }} {{ auth()->user()->last_name }}">

                    </div>


                    <h3 class="mb-8 text-lg font-normal text-gray-500 mt-4">Are you sure you want to perform this
                        action?</h3>

                    <button data-modal-hide="schedule-modal" type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="schedule-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                        cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Disposal --}}
<div id="admin-dispose" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <!-- Modal content -->
    <div class="relative p-4 bg-white rounded-lg shadow  sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
            <h3 class="text-lg font-semibold text-gray-900 ">
                Dispose Animal
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-toggle="admin-dispose">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form action="{{ route('dispose.animal', ['id' => $animal->id]) }}" method="post">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Animal
                        Type</label>
                    <p type="text" id="name"
                        class="capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                        {{ $animal->type }}</p>
                </div>
                <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 ">Gender</label>
                    <p type="text" id="brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                        {{ $animal->gender }}</p>
                </div>
                <div>
                    <label for="Weight" class="block mb-2 text-sm font-medium text-gray-900 ">Weight</label>
                    <p type="number" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                        {{ $animal->live_weight }} Kg.</p>
                </div>
                <div>
                    <label for="cause" class="block mb-2 text-sm font-medium text-gray-900 ">Inspected By:</label>
                    <input id="examinedBy" required name="examinedBy" readonly
                        value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                        class="cursor-not-allowed  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                        placeholder="{{ auth()->user()->firts_name }} {{ auth()->user()->last_name }}">

                </div>
                <div>
                    <label for="cause" class="block mb-2 text-sm font-medium text-gray-900 ">Cause</label>
                    <input id="category" required name="causes" maxlength="20"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                        placeholder="Enter Cause">

                </div>

                <div class="sm:col-span-2">
                    <label for="Remarks" class="block mb-2 text-sm font-medium text-gray-900 ">Remarks</label>
                    <textarea id="description" rows="5" required name="anteRemarks" maxlength="40"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Write a description..."></textarea>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Dispose
                </button>
            </div>
        </form>
    </div>
</div>


{{-- approve popup --}}

<div id="approve-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="approve-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <form method="post" action="{{ route('approve.status', ['id' => $animal->id]) }}">
                    @csrf
                    <svg class="text-green-700 w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <h3 class="mb-5 text-lg font-normal mt-4 text-gray-500 ">Are you sure you want to
                        approve
                        this Animal?</h3>
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="approve-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                        cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<nav id="approve-pop-up"
    class="fixed hidden bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-2xl backdrop-filter">
    <div class="">
        <h1 class="block font-semibold text-xl py-5">Do you want to <span class="text-green-600 ">APPROVE</span> this?
        </h1>
        <div class="py-3 flex justify-center gap-6 mx-auto mb-4">

            @csrf
            <button class="bg-[#293241] w-24 text-white py-2 rounded">YES</button>

            <a id="close-approve" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
        </div>
    </div>
</nav>
{{-- Reject popup --}}

<div id="reject-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="reject-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-4 md:p-5 text-center">
                <form method="post" action="{{ route('reject.status', ['id' => $animal->id]) }}">
                    @csrf
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div>{{-- remarks --}}

                        <div class="">
                            <textarea name="remarks" required placeholder="Type remarks"
                                class="whitespace-nowrap  w-full h-[100px] text-start resize-none border-b-4 rounded-t-xl bg-gray-200 border-blue-500 p-2"></textarea>
                        </div>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to
                            reject this Animal?</h3>
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="reject-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                            cancel
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>





{{-- rescheduling --}}



{{-- <div id="popup-modal" tabindex="-"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Reschedule
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5 text-center">

                <form action="{{ route('set.schedule', ['id' => $animal->id]) }}" method="post">
                    @csrf

                    <div class="pb-3">

                        <div class="w-full flex gap-4">
                            <input name="dateOfSlaughter" required type="date"
                                class="w-full p-2 border font-semibold border-gray-800 rounded focus:ring-4 focus:ring-blue-900"
                                value="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                            <input name="timeOfSlaughter" required type="time" value="{{ now()->format('H:i') }}"
                                class="w-full p-2 border font-semibold border-gray-800 rounded focus:ring-4 focus:ring-blue-900">
                        </div>
                    </div>


                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to reschedule this
                        Animal?
                    </h3>
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                        cancel</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const schedNav = document.getElementById('schedule-nav');
        const forSlaughterBtn = document.getElementById('toggle-schedule');
        const closeSched = document.getElementById('close-schedule');

        forSlaughterBtn.addEventListener('click', function() {
            schedNav.classList.remove('hidden');
        });

        closeSched.addEventListener('click', function() {
            schedNav.classList.add('hidden');
        });
    });
</script>
<script src="{{ asset('js/slaughterhouse.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var remark = document.getElementById("remarks-pop-up");
        var openRemark = document.getElementById("show-remarks");
        var closeRemark = document.getElementById("close-remarks");

        openRemark.addEventListener("click", () => {
            remark.classList.remove("hidden");
        });

        closeRemark.addEventListener("click", () => {
            remark.classList.add("hidden");
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var approveNav = document.getElementById("approve-pop-up");
        var openRemark = document.getElementById("show-approve-nav");
        var closeRemark = document.getElementById("close-approve");

        openRemark.addEventListener("click", () => {
            approveNav.classList.remove("hidden");
        });

        closeRemark.addEventListener("click", () => {
            approveNav.classList.add("hidden");
        });
    });
</script>
