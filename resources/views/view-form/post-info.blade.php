<section class="bg-white">
    <div class="py-8 px-4 max-w-2xl ">
        @if (optional($animal->postMortem)->postmortem_status === 'good' ?? 'N/A')
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Result:
                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                    {{ $animal->postMortem->postmortem_status ?? 'N/A' }}
                </span>
            </h2>
        @endif

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Slaughtered Time:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ optional($animal->postMortem)->slaughtered_at ? \Carbon\Carbon::parse($animal->postMortem->slaughtered_at)->format('M d Y h:i a') : 'N/A' }}

                </h1>
            </div>

            <div class="w-full">

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Slaughtered by:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    {{ $animal->postMortem->slaughtered_by ?? 'N/A' }}

                </h1>

            </div>

            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Carcass weight (Kg):</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->postMortem->post_weight ?? 'N/A' }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Inspected by:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->postMortem->inspected_by ?? 'N/A' }}

                </h1>
            </div>

            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Inspected Time:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ optional($animal->postMortem)->checked_at ? \Carbon\Carbon::parse($animal->postMortem->checked_at)->format('M d Y h:i a') : 'N/A' }}

                </h1>
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Contain condemn carcass:</label>
                <h1 type="text" name="name" id="name"
                    class="font-medium capitalize  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    {{ $animal->postMortem ? $animal->condemnCarcasses->count() : 0 }}

                </h1>
            </div>



            <div class="sm:col-span-2 font-medium rounded-lg capitalize">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg capitalize">
                    <thead class="text-xs text-gray-700  bg-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Part
                            </th>

                            <th scope="col" class="px-6 py-3 ">
                                Weight (grams)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cause
                            </th>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'inspector')
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($animal->condemnCarcasses->isEmpty())
                            <tr>
                                <td rowspan="1" colspan="6" class="py-4  text-center">
                                    <h1 class="font-semibold italic pb-3">No
                                        Condemn Carcass</h1>
                                </td>
                            </tr>
                        @else
                            @foreach ($animal->condemnCarcasses as $condemn)
                                <tr class="{{ $loop->odd ? 'odd:bg-white' : 'even:bg-gray-200' }} capitalize border-b">
                                    <form action="{{ route('edit.condemn.parts', ['id' => $condemn->id]) }}"
                                        method="post">
                                        @csrf
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <span id="part_{{ $condemn->id }}">{{ optional($condemn)->part }}</span>
                                            <input type="text" name="part"
                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                id="part_input_{{ $condemn->id }}"
                                                value="{{ optional($condemn)->part }}">
                                        </th>
                                        {{-- <td class="px-6 py-4">
                                            <span
                                                id="category_{{ $condemn->id }}">{{ optional($condemn)->category }}</span>
                                            <input type="text" name="category"
                                                id="category_input_{{ $condemn->id }}"
                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                value="{{ optional($condemn)->category }}">
                                        </td> --}}
                                        <td class="px-6 py-4">
                                            <span
                                                id="carcass_weight_{{ $condemn->id }}">{{ optional($condemn)->carcass_weight }}</span>
                                            <input type="number" name="condemnWeights"
                                                id="carcass_weight_input_{{ $condemn->id }}"
                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                value="{{ optional($condemn)->carcass_weight }}">
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                id="cause_{{ $condemn->id }}">{{ optional($condemn)->cause }}</span>
                                            <input type="text" name="cause" id="cause_input_{{ $condemn->id }}"
                                                class="hidden p-1 bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full"
                                                value="{{ optional($condemn)->cause }}">
                                        </td>
                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'inspector')
                                            <td class="px-6 py-4 space-x-1">
                                                <a onclick="editRow({{ $condemn->id }})"
                                                    class="cursor-pointer  font-medium text-blue-600 hover:underline">
                                                    <span id="editSpan_{{ $condemn->id }}">Edit</span>
                                                    <span id="cancelSpan_{{ $condemn->id }}"
                                                        class="hidden">Cancel</span>
                                                </a>

                                                <button id="button_{{ $condemn->id }}" type="submit"
                                                    class="cursor-pointer hidden  font-medium text-green-600 hover:underline">
                                                    Save
                                                </button>
                                            </td>
                                        @endif
                                    </form>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</section>
<script>
    let activeRowId = null;

    function editRow(id) {
        if (activeRowId !== null && activeRowId !== id) {
            // If another row is active, cancel editing for that row
            cancelEditing(activeRowId);
        }

        // Toggle visibility of text and input elements
        toggleEditing(id);

        // Update the active row ID
        activeRowId = (activeRowId === id) ? null : id;
    }

    function cancelEditing(id) {
        // Close the currently active row
        toggleEditing(id);
    }

    function toggleEditing(id) {
        // Toggle visibility of text and input elements
        document.getElementById(`part_${id}`).classList.toggle('hidden');
        document.getElementById(`part_input_${id}`).classList.toggle('hidden');

        document.getElementById(`carcass_weight_${id}`).classList.toggle('hidden');
        document.getElementById(`carcass_weight_input_${id}`).classList.toggle('hidden');

        document.getElementById(`cause_${id}`).classList.toggle('hidden');
        document.getElementById(`cause_input_${id}`).classList.toggle('hidden');

        document.getElementById(`button_${id}`).classList.toggle('hidden');

        const editSpan = document.getElementById(`editSpan_${id}`);
        const cancelSpan = document.getElementById(`cancelSpan_${id}`);

        if (editSpan && cancelSpan) {
            if (editSpan.classList.contains('hidden')) {
                // "Cancel" is currently displayed, switch to "Edit"
                editSpan.classList.remove('hidden');
                cancelSpan.classList.add('hidden');
            } else {
                // "Edit" is currently displayed, switch to "Cancel"
                editSpan.classList.add('hidden');
                cancelSpan.classList.remove('hidden');
            }
        }
    }
</script>
{{-- @include('admin.view-form.image-modal') --}}
