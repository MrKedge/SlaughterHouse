<section class="bg-white  ">
    <div class="w-full px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Animal Registration</h2>
        <form action="{{ route('store.animal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                {{--  --}}
                <div class="sm:col-span-2">
                    <h1 for="name" class="block mb-2 text-sm font-medium text-[#EE6C4D] ">Client
                        Information</h1>
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Name</label>
                    <h1 type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                        @auth
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        @endauth
                    </h1>
                </div>
                @if (auth()->user()->role === 'client')
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Address
                        </label>
                        <h1 type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                            @auth
                                {{ auth()->user()->address }}
                            @endauth
                        </h1>
                    </div>
                @endif
            </div>

            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <h1 for="name" class="block mb-2 text-sm font-medium text-[#EE6C4D] ">Animal
                        Information</h1>
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Animal Type</label>
                    <select name="kindOfAnimal" id="typeOfAnimal" required
                        class="type-animal font-medium  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Source
                    </label>
                    <select name="source" id="" required
                        class="font-medium bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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

                <div class="grid gap-4 sm:grid-cols-3 ">
                    <ul
                        class="w-28    text-sm font-medium text-gray-900 border border-gray-400 rounded-lg bg-gray-50  ">
                        <li class="w-full border-b border-gray-200 rounded-t-lg  ">
                            <div class="flex items-center ps-3">
                                <input id="list-radio-male" type="radio" value="male" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 ">
                                <label for="list-radio-male"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Male
                                </label>
                            </div>
                        </li>
                        <li class="w-full border-gray-200 rounded-t-lg ">
                            <div class="flex items-center ps-3">
                                <input id="list-radio-female" type="radio" value="female" name="gender" required
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500  ">
                                <label for="list-radio-female"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">female
                                </label>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900  "
                            for="">Age:(months)</label>
                        <input type="number" name="age" required
                            oninput="formatAge(this); limitInputValue(this, 2000)" min="1" max="2000"
                            placeholder="Age"
                            class="font-medium  bg-gray-50 border border-gray-400  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   text-gray-800  ">
                        <div id="displayAge" class="text-gray-500 text-sm mt-2"></div>
                    </div>
                    <div>
                        <label class="block whitespace-nowrap mb-2 text-sm font-medium text-gray-900  "
                            for="">Live Wt.
                            (Kilogram)</label>
                        <input type="number" max="2000" name="liveWeight" required min="1"
                            placeholder="Weight" step="0.01" oninput="limitInputValue(this)"
                            class="font-medium bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">

                    </div>
                </div>

                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900  " for="">Butcher:</label>
                    <select name="butcher" id="" required
                        class="font-medium  bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  text-gray-800  ">
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
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="">Destination:</label>
                    <select name="destination" id="" required
                        class="font-medium bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                <div class="w-full hidden" id="ageClassifyDiv">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="">Age Classification
                        (Swine):</label>
                    <select name="ageClassify" id="putAgeClassify"
                        class="capitalize  font-medium  age-classify bg-gray-50 border border-gray-300
                                text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 
                                
                                ">
                        <option value="" disabled selected>select</option>
                        @foreach ($animal as $animals)
                            @if (!is_null($animals->animal_ageclassify) && $animals->animal_ageclassify !== '')
                                <option value="{{ $animals->animal_ageclassify }}">
                                    {{ $animals->animal_ageclassify }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-2 mx-auto">
                    @include('client.layout.client-draw-animal')
                </div>

            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-3 sm:gap-6 sm:mb-5">
                {{--  --}}
                <div id="title-doc" class="hidden sm:col-span-3">
                    <h1 for="name" class="block mb-2 text-sm font-medium text-[#EE6C4D] ">
                        Documents
                    </h1>
                </div>
                <div class="image-div hidden w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Certificate of ownership</label>
                    <label for="certOwnershipInput"
                        class="cursor-pointer flex justify-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5">
                        <span id="imageLabelOwnership" class="font-medium flex items-center"><i class='bx bx-plus'
                                style='font-size: 2em;'></i> Add image</span>
                        <input id="certOwnershipInput" name="certOwnership" accept="image/*" type="file"
                            class="hidden" onchange="updateLabel(this, 'imageLabelOwnership');">
                    </label>


                </div>
                <div class="image-div hidden w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Cert.
                        of Transfer of Large Cattle</label>
                    <label for="certTransferInput"
                        class="cursor-pointer flex justify-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5">
                        <span id="imageLabelTransfer" class="text-left font-medium flex items-center"><i
                                class='bx bx-plus' style='font-size: 2em;'></i> Add image</span>
                        <input id="certTransferInput" name="certTransfer" accept="image/*" type="file"
                            class="hidden" onchange="updateLabel(this, 'imageLabelTransfer');">
                    </label>
                </div>
                <div id="brgyClearance" class="image-div hidden w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Brgy. clearance</label>
                    <label for="brgy-clearance"
                        class="cursor-pointer flex justify-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5">
                        <span id="imageLabelClearance" class="text-left font-medium flex items-center">
                            <i class='bx bx-plus' style='font-size: 2em;'></i> Add Image
                        </span>
                        <input id="brgy-clearance" name="brgyClearance" accept="image/*" type="file"
                            class="hidden" onchange="updateLabel(this, 'imageLabelClearance');">
                    </label>
                </div>

            </div>
            <div class="flex items-center space-x-4">
                <button type="button" data-modal-target="register-modal" data-modal-toggle="register-modal"
                    class="inline-flex items-center gap-2 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                    Register
                </button>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.view.animal.reg.list') }}"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                        </svg>

                        Cancel
                    </a>
                @endif
                @if (auth()->user()->role === 'client')
                    <a href="{{ route('client.animal.list.register') }}"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                        </svg>

                        Cancel
                    </a>
                @endif
            </div>

            <div id="register-modal" tabindex="-1"
                class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full">
                {{-- <div class="fixed inset-0 backdrop-blur-3xl  bg-white  bg-opacity-60 transition-opacity"></div> --}}
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow ">
                        <button type="submit"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="register-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to register
                                this Animal?</h3>
                            <button type="submit" data-modal-hide="register-modal" type="button"
                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="register-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>



<script>
    function updateLabel(input, labelId) {
        const label = document.getElementById(labelId);
        if (input.files.length > 0) {
            label.innerHTML = input.files[0].name;
        } else {
            label.innerHTML = "<i class='bx bx-plus' style='font-size: 2em;'></i> Add image";
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

    function ageClassify() {
        var titleDoc = document.getElementById("title-doc");
        var typeOfAnimal = document.getElementById("typeOfAnimal").value;
        var ageClassifyDiv = document.getElementById("ageClassifyDiv");
        var inputAgeClassify = document.getElementById("putAgeClassify");

        // Get all elements with the class 'image-div'
        var imageDivs = document.querySelectorAll('.image-div');

        if (typeOfAnimal === "swine") {
            ageClassifyDiv.classList.remove('hidden');
            inputAgeClassify.required = true;
            titleDoc.classList.remove('hidden');
            // Hide all image divs when typeOfAnimal is swine
            imageDivs.forEach(function(div) {
                div.classList.add('hidden');
            });
            var brgyClearanceDiv = document.getElementById('brgyClearance');
            if (brgyClearanceDiv) {
                brgyClearanceDiv.classList.remove('hidden');
            }
        } else {
            ageClassifyDiv.classList.add('hidden');
            inputAgeClassify.required = false;

            // Show all image divs when typeOfAnimal is not swine
            imageDivs.forEach(function(div) {
                div.classList.remove('hidden');
            });
            titleDoc.classList.remove('hidden');
        }
    }

    // Add an event listener to call ageClassify when the dropdown changes
    var typeOfAnimalDropdown = document.getElementById("typeOfAnimal");
    typeOfAnimalDropdown.addEventListener("change", ageClassify);


    var imageUrls = {
        cow: "{{ asset('images/cow.png') }}",
        horse: "{{ asset('images/horse.png') }}",
        carabao: "{{ asset('images/carabao.png') }}",
    };
</script>
