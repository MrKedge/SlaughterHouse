<div class=" bg-white px-10 rounded-md  shadow-2xl py-6">
    <h1
        class="text-center bg-gray-200 rounded-2xl font-extrabold mb-3 text-[#293241] py-8 text-2xl border-b-2 border-gray-400">
        REGISTRATION
    </h1>
    <form action="{{ route('store.animal') }}" method="POST" enctype="multipart/form-data"
        class="flex w-full justify-center relative">
        @csrf
        <div class="w-full">
            <div class="scrollbar-gutter pr-5 pb-20 overflow-y-auto h-[500px] space-y-10 border-b border-gray-400">

                <div class="grid grid-flow-row  md:grid-flow-col gap-10 w-full">
                    {{-- owner info --}}
                    <div class="">
                        <h1 class="font-bold pointer-events-none text-lg italic">Owner Information</h1>

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Owner
                            Name:</label>

                        <p id="ownerName"
                            class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @auth
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            @endauth
                        </p>
                    </div>

                    <div>
                        <h1 class="font-bold opacity-0 text-lg">Owner Information</h1>
                        @if (auth()->user()->role === 'client')
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Address:</label>

                            <p id="address"
                                class="font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @auth
                                    {{ auth()->user()->address }}
                                @endauth
                            </p>
                        @endif
                    </div>
                </div>


                <div class="grid grid-flow-row md:grid-flow-col md:gap-10">{{-- document info --}}
                    <div>

                        <h1 class="font-bold pointer-events-none text-lg italic">Documents</h1>

                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">
                            Certificate of Ownership:</p>

                        <div class="flex relative">


                            <label for="certOwnershipInput"
                                class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center pt-3">
                                <span class="text-left font-medium flex items-center"><i class='bx bx-plus'
                                        style='font-size: 2em;'></i> Add
                                    image</span>
                                <input id="certOwnershipInput" name="certOwnership" accept="image/*" type="file"
                                    class="hidden" onchange="readURL(this, 'cert-owner');">
                            </label>

                            <img id="cert-owner" src="#" alt="your image"
                                class="hidden w-[100px] absolute h-full right-1/4 border border-dashed  border-black  ">


                        </div>
                    </div>
                    <div>

                        <h1 class="font-bold pointer-events-none text-lg italic opacity-0">Documents
                        </h1>

                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">
                            Cert.
                            of Transfer of Large Cattle:</p>

                        <div class="flex relative">


                            <label for="certTransferInput"
                                class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center pt-3">
                                <span class="text-left font-medium flex items-center"><i class='bx bx-plus'
                                        style='font-size: 2em;'></i> Add
                                    image</span>
                                <input id="certTransferInput" name="certTransfer" accept="image/*" type="file"
                                    class="hidden" onchange="readURL(this, 'cert-transfer');">
                            </label>
                            <img id="cert-transfer" src="#" alt="your image"
                                class="hidden w-[100px] absolute h-full right-1/4 border border-dashed  border-black  ">


                        </div>
                    </div>

                    <div>

                        <h1 class="font-bold pointer-events-none text-lg italic opacity-0">Documents
                        </h1>

                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">
                            Brgy. Clearance
                        </p>

                        <div class="flex relative">


                            <label for="brgy-clearance"
                                class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center pt-3">
                                <span class=" text-left font-medium flex items-center"><i class='bx bx-plus'
                                        style='font-size: 2em;'></i> Add
                                    image</span>
                                <input id="brgy-clearance" name="brgyClearance" accept="image/*" type="file"
                                    class="hidden" onchange="readURL(this, 'clearance-brgy');">
                            </label>
                            <img id="clearance-brgy" src="#" alt="your image"
                                class="hidden w-[100px] absolute h-full right-1/4 border border-dashed  border-black  ">


                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}
                    <div class="space-y-8">
                        <div>
                            <h1 class="font-bold text-lg italic">Animal Information</h1>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Animal:</label>
                            <select name="kindOfAnimal" id="typeOfAnimal" required
                                class="type-animal font-medium  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option pla value="" disabled selected>Select</option>
                                @foreach ($animal as $animals)
                                    @if (!is_null($animals->animal_type) && $animals->animal_type !== '')
                                        <option value="{{ $animals->animal_type }}">
                                            {{ $animals->animal_type }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-start gap-7">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"
                                    for="">Gender:</label>
                                <div class="">
                                    <ul
                                        class="w-28    text-sm font-medium text-gray-900 border border-gray-200 rounded-lg bg-gray-50 dark:border-gray-600 dark:text-white">
                                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="list-radio-male" type="radio" value="male" name="gender"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:border-gray-500">
                                                <label for="list-radio-male"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Male
                                                </label>
                                            </div>
                                        </li>
                                        <li class="w-full border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="list-radio-female" type="radio" value="female"
                                                    name="gender"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:border-gray-500">
                                                <label for="list-radio-female"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">female
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"
                                    for="">Age:(months)</label>
                                <input type="number" name="age" required
                                    oninput="formatAge(this); limitInputValue(this, 2000)" min="1"
                                    max="2000" placeholder="Age"
                                    class="font-medium  bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div id="displayAge" class="text-gray-500 text-sm mt-2"></div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"
                                    for="">Live Wt.
                                    (Kilogram)</label>
                                <input type="number" max="2000" name="liveWeight" required min="1"
                                    placeholder="Weight" step="0.01" oninput="limitInputValue(this)"
                                    class="font-medium bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"
                                for="">Destination:</label>
                            <select name="destination" id="" required
                                class="font-medium bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>Select</option>
                                @foreach ($animal as $animals)
                                    @if (!is_null($animals->animal_destination) && $animals->animal_destination !== '')
                                        <option value="{{ $animals->animal_destination }}">
                                            {{ $animals->animal_destination }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>



                    <div class="space-y-8">

                        <div>
                            <h1 class="font-bold opacity-0 text-lg">Animal Information</h1>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Source:</label>
                            <select name="source" id="" required
                                class="font-medium  bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>Select</option>
                                @foreach ($animal as $animals)
                                    @if (!is_null($animals->animal_source) && $animals->animal_source !== '')
                                        <option value="{{ $animals->animal_source }}">
                                            {{ $animals->animal_source }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            {{-- <h1 class="font-bold opacity-0 text-lg">Animal Information</h1> --}}
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"
                                for="">Butcher:</label>
                            <select name="butcher" id="" required
                                class="font-medium  bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>Select</option>
                                @foreach ($animal as $animals)
                                    @if (!is_null($animals->animal_butcher) && $animals->animal_butcher !== '')
                                        <option value="{{ $animals->animal_butcher }}">
                                            {{ $animals->animal_butcher }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="hidden " id="ageClassifyDiv">
                            <label for=""
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Age
                                Classification:</label>
                            <select name="ageClassify" id="putAgeClassify"
                                class="capitalize  font-medium  age-classify bg-gray-50 border border-gray-300
                                text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                                dark:placeholder-gray-400  dark:focus:ring-blue-500
                                dark:focus:border-blue-500">
                                <option value="" disabled selected>select</option>
                                @foreach ($animal as $animals)
                                    @if (!is_null($animals->animal_ageclassify) && $animals->animal_ageclassify !== '')
                                        <option value="{{ $animals->animal_ageclassify }}">
                                            {{ $animals->animal_ageclassify }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <div class="text-gray-500 text-sm mt-2">fattener - 49kg</div>
                            <div class="text-gray-500 text-sm mt-2">grower - 50kg above</div>
                            <div class="text-gray-500 text-sm mt-2">culled sow/boar - 100kg</div> --}}
                        </div>


                        <div class="absolute bottom-0 right-5 pb-[20px]">
                            <button type="submit"
                                class="bg-green-500 text-white hover:bg-green-700 font-bold py-2 px-4 rounded">
                                Register
                            </button>

                            <a href="{{ route('client.overview') }}"
                                class="bg-red-500 text-white hover:bg-red-700 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                        </div>
                    </div>

                </div>


                <div class="flex justify-center">
                    @include('client.layout.client-draw-animal')
                </div>

            </div>
        </div>
    </form>
</div>


<script>
    function readURL(input, targetId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + targetId)
                    .attr('src', e.target.result)
                    .removeClass('hidden') // Remove the 'hidden' class to display the image
                    .show(); // Ensure the image is displayed
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
    var imageUrls = {
        cow: "{{ asset('images/cow.png') }}",
        horse: "{{ asset('images/horse.png') }}",
        carabao: "{{ asset('images/carabao.png') }}",
    };
</script>


<script src="{{ asset('js/slaughterhouse.js') }}"></script>

<script>
    function limitInputValue(input) {
        if (input.value > 2000) {
            input.value = 2000;
        }
    }

    function formatAge(input) {
        // Limit the input value to a maximum of 2000
        const maxValue = 2000;
        const inputValue = Math.min(parseInt(input.value) || 0, maxValue);

        // Convert months to years and months for display
        const years = Math.floor(inputValue / 12);
        const months = inputValue % 12;

        // Construct the formatted age string
        let ageString = '';
        if (years > 0) {
            ageString += years === 1 ? '1 year' : `${years} years`;
        }
        if (months > 0) {
            ageString += years > 0 ? ' ' : ''; // Add space if both years and months are present
            ageString += months === 1 ? '1 month' : `${months} months`;
        }

        // Display the formatted age string
        const displayElement = document.getElementById('displayAge');
        if (displayElement) {
            displayElement.textContent = ageString;
        }
    }
</script>
