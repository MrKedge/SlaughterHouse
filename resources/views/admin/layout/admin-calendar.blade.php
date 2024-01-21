<form method="POST" action="{{ route('scheduled.queue') }}"
    class="mt-10 bg-white max-w-max p-3 rounded-lg border border-gray-300">
    @csrf


    <div class="relative max-w-sm inline-block">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
            </svg>
        </div>
        <input datepicker datepicker-title="Slaughtech Calendar" type="text" id="test" name="selectedDate"
            autocomplete="off"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
            placeholder="Select date">

    </div>
    <button type="submit"
        class="focus:outline-none text-white bg-[#38419D] hover:bg-[#1f2458] focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">View</button>
</form>

<script>
    const datapicker = document.getElementById('test');

    new Datepicker(datapicker, {
        todayHighlight: true,
        minDate: new Date()
    });
</script>
