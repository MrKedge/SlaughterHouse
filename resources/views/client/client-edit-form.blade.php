<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Update Form'])

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="min-h-screen w-screen ">
        {{-- <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image"> --}}
        {{-- header --}}
        @include('client.layout.client-header')
        {{-- header --}}


        <div class="flex w-full">

            <div class=""> @include('client.layout.sidepanel')</div>

            {{-- main content --}}

            <section class="flex flex-col h-full pt-8 w-full mx-6">


                <div class=" bg-white px-10 rounded-2xl  shadow-2xl py-6">
                    <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">EDIT REGISTRATION
                    </h1>
                    <form action="{{ route('update.form', ['id' => $animal->id]) }}" method="POST"
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

                                        <label for="certOwnershipInput"
                                            class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center">
                                            <span class="mx-auto font-medium flex items-center"><i class='bx bx-plus'
                                                    style='font-size: 2em;'></i> Add image</span>
                                            <input id="certOwnershipInput" name="certOwnership" accept="image/*"
                                                type="file" class="hidden">
                                        </label>

                                    </div>

                                    <div>
                                        <h1 class="font-bold pointer-events-none text-lg italic opacity-0">Documents
                                        </h1>

                                        <p class="block pb-1 pt-3">Cert. of Transfer of Large Cattle:</p>
                                        <label for="certTransferInput"
                                            class="cursor-pointer border-2 border-gray-500 rounded-md p-2 w-[300px] flex items-center">
                                            <span class="mx-auto font-medium flex items-center"><i class='bx bx-plus'
                                                    style='font-size: 2em;'></i> Add image</span>
                                            <input id="certTransferInput" name="certTransfer" accept="image/*"
                                                type="file" class="hidden">
                                        </label>
                                    </div>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                    <div class="space-y-8">
                                        <div>
                                            <h1 class="font-bold text-lg italic">Animal Information</h1>
                                            <label class="block pb-1 pt-3" for="">Animal:</label>
                                            <select name="kindOfAnimal" id="typeOfAnimal" required
                                                class=" border-2 border-black rounded-md p-2 w-full">
                                                <option value="{{ $animal->type }}">{{ $animal->type }}</option>
                                                @foreach ($formValue as $animals)
                                                    @if (!is_null($animals->animal_type) && $animals->animal_type !== '')
                                                        <option value="{{ $animals->animal_type }}">
                                                            {{ $animals->animal_type }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex gap-8">
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Gender:</label>
                                                <div class="">
                                                    <div>
                                                        <input type="radio" id="male" name="gender"
                                                            value="male"
                                                            class="border-2 border-black rounded-md p-2 inline-block"
                                                            required {{ $animal->gender == 'male' ? 'checked' : '' }}>
                                                        <label for="male"
                                                            {{ $animal->gender == 'female' ? 'checked' : '' }}>Male</label>
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
                                                    value="{{ $animal->age }}"
                                                    class=" border-2 border-black rounded-md p-2 w-full">

                                            </div>
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Live Wt.
                                                    (Kilogram)</label>
                                                <input type="number" name="liveWeight" required min="0"
                                                    value="{{ $animal->live_weight }}"
                                                    class=" border-2 border-black rounded-md p-2 w-full">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block pb-1 pt-3" for="">Destination:</label>
                                            <select name="destination" id="" required
                                                class=" border-2 border-black rounded-md p-2 w-full">
                                                <option value="{{ $animal->destination }}">{{ $animal->destination }}
                                                </option>
                                                @foreach ($formValue as $animals)
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
                                                class=" border-2 border-black rounded-md p-2 w-full">
                                                <option value="{{ $animal->butcher }}">{{ $animal->butcher }}
                                                </option>
                                                @foreach ($formValue as $animals)
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
                                                class=" border-2 border-black rounded-md p-2 w-full">
                                                <option value="{{ $animal->age_classify }}">
                                                    {{ $animal->age_classify }}</option>
                                                @foreach ($formValue as $animals)
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
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Update
                                            </button>

                                            <a href="{{ route('client.animal.list.register') }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>



























    </div>

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        sidePanel();
        dropDown();
    </script>

</body>

</html>
