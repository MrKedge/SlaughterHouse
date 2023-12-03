<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Register'])

<body class="bg-[#D5DFE8] overflow-hidden ">


    <div class="min-h-screen w-screen "> {{-- wrapper --}}



        {{-- header --}}
        @include('client.layout.client-header')
        {{-- header --}}


        {{-- main content --}}
        <div class="flex w-full">


            <div class=""> @include('client.layout.sidepanel')</div>


            <section class="flex flex-col h-full pt-8 w-full mx-6">


                <div class=" bg-white px-10 rounded-2xl  shadow-2xl py-6">
                    <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION
                    </h1>
                    <form action="{{ route('store.animal') }}" method="POST" enctype="multipart/form-data"
                        class="flex w-full justify-center relative">
                        @csrf
                        <div class="w-full">
                            <div class="scrollbar-gutter pr-5 pb-20 overflow-y-auto h-[500px] space-y-10">

                                <div class="grid grid-flow-row  md:grid-flow-col gap-10 w-full">
                                    {{-- owner info --}}
                                    <div class="">
                                        <h1 class="font-bold pointer-events-none text-lg italic">Owner Information</h1>

                                        <label class="block pb-1 pt-3" for="ownerName">Owner Name:</label>

                                        <p id="ownerName"
                                            class="text-center capitalize border-2 border-black rounded-md w-full p-2">
                                            @auth
                                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                            @endauth
                                        </p>
                                    </div>

                                    <div>
                                        <h1 class="font-bold opacity-0 text-lg">Owner Information</h1>
                                        <label class="block pb-1 pt-3" for="address">Address:</label>
                                        <p id="address"
                                            class="text-center capitalize border-2 border-black rounded-md w-full p-2">
                                            @auth
                                                {{ auth()->user()->address }}
                                            @endauth
                                        </p>
                                    </div>
                                </div>


                                <div class="grid grid-flow-row md:grid-flow-col md:gap-10">{{-- document info --}}
                                    <div>

                                        <h1 class="font-bold pointer-events-none text-lg italic">Documents</h1>

                                        <p class="block pb-1 pt-3">Certificate of Ownership:</p>

                                        <div class="flex relative">


                                            <label for="certOwnershipInput"
                                                class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center">
                                                <span class="mx-auto font-medium flex items-center"><i
                                                        class='bx bx-plus' style='font-size: 2em;'></i> Add
                                                    image</span>
                                                <input id="certOwnershipInput" name="certOwnership" accept="image/*"
                                                    type="file" class="hidden" required
                                                    onchange="readURL(this, 'cert-owner');">
                                            </label>

                                            <img id="cert-owner" src="#" alt="your image"
                                                class="hidden w-[100px] absolute h-full right-1/4 border border-dashed  border-black  ">


                                        </div>
                                    </div>
                                    <div>

                                        <h1 class="font-bold pointer-events-none text-lg italic opacity-0">Documents
                                        </h1>

                                        <p class="block pb-1 pt-3">Cert. of Transfer of Large Cattle:</p>

                                        <div class="flex relative">


                                            <label for="certTransferInput"
                                                class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center">
                                                <span class="mx-auto font-medium flex items-center"><i
                                                        class='bx bx-plus' style='font-size: 2em;'></i> Add
                                                    image</span>
                                                <input id="certTransferInput" name="certTransfer" accept="image/*"
                                                    type="file" class="hidden"
                                                    onchange="readURL(this, 'cert-transfer');">
                                            </label>
                                            <img id="cert-transfer" src="#" alt="your image"
                                                class="hidden w-[100px] absolute h-full right-1/4 border border-dashed  border-black  ">


                                        </div>
                                    </div>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                    <div class="space-y-8">
                                        <div>
                                            <h1 class="font-bold text-lg italic">Animal Information</h1>
                                            <label class="block pb-1 pt-3" for="">Animal:</label>
                                            <select name="kindOfAnimal" id="typeOfAnimal" required
                                                class="type-animal border-2 border-black rounded-md w-full p-2">
                                                <option value="" disabled selected>Select</option>
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
                                                <label class="block pb-1 pt-3" for="">Gender:</label>
                                                <div class="">
                                                    <div>
                                                        <input type="radio" id="male" name="gender"
                                                            value="male"
                                                            class="border-2 border-black rounded-md p-2 inline-block"
                                                            required>
                                                        <label for="male">Male</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" id="female" name="gender"
                                                            value="female" class="border-2 border-black rounded-md p-2"
                                                            required>
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Age: (Months)</label>
                                                <input type="number" name="age" required min="0"
                                                    max="2000" step="0.01"
                                                    class="border-2 border-black rounded-md p-2">
                                            </div>
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Live Wt.
                                                    (Kilogram)</label>
                                                <input type="number" max="2000" name="liveWeight" required
                                                    min="0" class="border-2 border-black rounded-md p-2">

                                            </div>
                                        </div>

                                        <div>
                                            <label class="block pb-1 pt-3" for="">Destination:</label>
                                            <select name="destination" id="" required
                                                class="border-2 border-black rounded-md w-full p-2">
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
                                            <label class="block pb-1 pt-3" for="">Butcher:</label>
                                            <select name="butcher" id="" required
                                                class="border-2 border-black rounded-md w-full p-2">
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

                                        <div class="hidden" id="ageClassifyDiv">
                                            <label for="" class="block pb-1 pt-3">Age Classification:</label>
                                            <select name="ageClassify" id="putAgeClassify"
                                                class="age-classify border-2 border-black rounded-md w-full p-2">
                                                <option value="" disabled selected>select</option>
                                                @foreach ($animal as $animals)
                                                    @if (!is_null($animals->animal_ageclassify) && $animals->animal_ageclassify !== '')
                                                        <option value="{{ $animals->animal_type }}">
                                                            {{ $animals->animal_ageclassify }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="absolute bottom-0 right-5 pb-[20px]">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Register
                                            </button>

                                            <a href="{{ route('client.overview') }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
            </section>

        </div>
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
</body>

</html>
