<section class="bg-white">
    <div class="py-8 px-4 max-w-2xl ">
        @if (optional($animal->anteMortem)->inspection_status !== null)
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Result:
                @if (optional($animal->anteMortem)->inspection_status === 'for slaughter')
                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                        {{ $animal->anteMortem->inspection_status ?? 'N/A' }}
                    </span>
                @elseif(optional($animal->anteMortem)->inspection_status === 'disposal')
                    <span class="bg-[#f9afaf] text-[#5e2020] text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                        {{ $animal->anteMortem->inspection_status ?? 'N/A' }}
                    </span>
                @endif

            </h2>
        @endif
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Time of Arrival:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ optional($animal->anteMortem)->arrived_at ? \Carbon\Carbon::parse($animal->anteMortem->arrived_at)->format('M d Y h:i a') : 'N/A' }}

                </h1>
            </div>

            <div class="w-full">

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Inspected Time:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    {{ optional($animal->anteMortem)->inspected_at ? \Carbon\Carbon::parse($animal->anteMortem->inspected_at)->format('M d Y h:i a') : 'N/A' }}
                </h1>

            </div>

            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Inspected by:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->anteMortem->examined_by ?? 'N/A' }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Schedule:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ optional($animal->schedule)->scheduled_at ? \Carbon\Carbon::parse($animal->schedule->scheduled_at)->format('M d Y h:i a') : 'N/A' }}

                </h1>
            </div>
            @if (optional($animal->anteMortem)->inspection_status === 'disposal')
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Causes:</label>
                    <h1 type="text" name="name" id="name"
                        class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                        {{ $animal->anteMortem->causes ?? 'N/A' }}

                    </h1>
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Remarks:</label>
                    <h1 type="text" name="name" id="name"
                        class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                        {{ $animal->anteMortem->ante_remarks ?? 'N/A' }}

                    </h1>
                </div>
            @endif


            <div class="grid gap-4 sm:grid-cols-2 ">
                {{-- Reserve --}}
            </div>


        </div>
    </div>
</section>

{{-- @include('admin.view-form.image-modal') --}}
