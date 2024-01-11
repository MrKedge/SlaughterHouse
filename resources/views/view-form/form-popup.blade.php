<div id="approve-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    {{-- <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-20 transition-opacity"></div> --}}
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
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
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
    {{-- <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-20 transition-opacity"></div> --}}
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



{{-- image pop up --}}

{{-- rescheduling --}}



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

    function limitInputValue(input) {
        if (input.value > 2000) {
            input.value = 2000;
        }
    }
</script>
