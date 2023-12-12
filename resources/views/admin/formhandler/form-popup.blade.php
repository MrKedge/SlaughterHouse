{{-- approve popup --}}
<nav id="approve-pop-up"
    class="fixed hidden bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-2xl backdrop-filter">
    <div class="">
        <h1 class="block font-semibold text-xl py-5">Do you want to <span class="text-green-600 ">APPROVE</span> this?
        </h1>
        <div class="py-3 flex justify-center gap-6 mx-auto mb-4">
            <form method="post" action="{{ route('approve.status', ['id' => $animal->id]) }}">
                @csrf
                <button class="bg-[#293241] w-24 text-white py-2 rounded">YES</button>
            </form>
            <a id="close-approve" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
        </div>
    </div>
</nav>
{{-- Reject popup --}}
<nav id="remarks-pop-up"
    class="hidden fixed bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-2xl">
    <form method="post" action="{{ route('reject.status', ['id' => $animal->id]) }}">
        <div class="p-3">
            <textarea name="remarks" placeholder="Write a Remarks..." required
                class="w-full h-[100px] resize-none border-b-4 rounded-t-xl bg-gray-200 border-blue-500 p-2"></textarea>
            <h1 class="block font-semibold text-xl py-1">Do you want to <span
                    class="text-red-600 font-semibold">REJECT</span> this?</h1>
            <div class="py-3 flex justify-center gap-6 mx-auto">
                @csrf
                <button class="bg-[#293241] w-24 text-white py-2 rounded">YES</button>
                <a id="close-remarks" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
            </div>
        </div>
    </form>
</nav>

{{-- SCHED POPUP --}}
<nav id="schedule-nav"
    class="bg-white fixed h-auto px-6 pb-6 rounded-md hidden text-[#293241] top-1/3  right-1/3  shadow-2xl">

    <form action="{{ route('set.schedule', ['id' => $animal->id]) }}" method="post" class="space-y-4">
        @csrf
        <div class="pb-3">
            <label class="font-bold text-xl">Time of Slaughter</label>
            <div class="text-center pt-1">
                <input name="dateOfSlaughter" required type="date"
                    class="p-2 border-2 font-semibold border-gray-800 rounded"
                    value="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                <input name="timeOfSlaughter" required type="time"
                    class="p-2 border-2 font-semibold border-gray-800 rounded" value="04:00">
            </div>
        </div>
        <div class="flex gap-4">
            <button type="submit"
                class="py-2 w-full bg-gray-700 hover:bg-gray-800 text-white font-bold rounded text-center">SET</button>
            <a id="close-schedule"
                class=" py-2 w-full bg-gray-700 hover:bg-gray-800 text-white font-bold rounded text-center">Back</a>
        </div>
    </form>
</nav>
{{-- Disposal --}}
<div id="updateProductModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Dispose Animal
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="updateProductModal">
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
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Animal Type</label>
                        <p type="text" id="name"
                            class="capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            {{ $animal->type }}</p>
                    </div>
                    <div>
                        <label for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <p type="text" id="brand"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            {{ $animal->gender }}</p>
                    </div>
                    <div>
                        <label for="Weight"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                        <p type="number" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            {{ $animal->live_weight }} Kg.</p>
                    </div>
                    <div>
                        <label for="cause"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cause</label>
                        <select id="category" required name="causes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled selected>Choose</option>
                            <option value="disease">Disease</option>
                            <option value="illness">Illness</option>
                            <option value="physical defects">Physical Defects</option>
                            <option value="Contamination">Contamination</option>
                            <option value="Humane Treatment">Humane Treatment</option>
                            <option value="">Others</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="Remarks"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                        <textarea id="description" rows="5" required name="anteRemarks" maxlength="40"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Write a description..."></textarea>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
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
</div>

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
