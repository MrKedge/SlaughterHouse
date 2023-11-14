<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewing animal form</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] ">

    <div>{{-- wrapperr --}}
        {{-- <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image"> --}}
        <div class="z-10 flex items-center justify-between bg-white h-[40px] sticky top-0">
            {{-- header --}}
            <div class="text-center font-bold w-[240px] bg-[#293241] h-full p-2">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div>
                @auth
                    <p class="font-extrabold capitalize px-4 text-[#293241] ">
                        {{ auth()->user()->first_name }}
                    </p>
                @endauth
            </div>

        </div> {{-- end header --}}
        <div class="flex">

            @include('client.layout.sidepanel')

        </div>
        {{-- main content --}}
        <div class="flex justify-center pt-[40px] ml-[60px]"> {{-- wrapper --}}
            <section
                class="overflow-y-auto rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg  backdrop-filter backdrop-blur-lg border">
                <div class="bg-white">
                    <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION
                    </h1>
                </div>

                <div class="flex bg-white px-20 pb-20 ">

                    <form action="{{ route('store.animal') }}" method="POST" class="flex justify-center relative">
                        @csrf
                        <div class=" space-y-8 ">

                            <div class="grid grid-flow-row md:grid-flow-col md:gap-10">{{-- owner info --}}
                                <div class="">
                                    <h1 class="font-bold pointer-events-none text-lg">Owner Information</h1>

                                    <label class="block" for="ownerName">Owner Name:</label>

                                    <p id="ownerName"
                                        class="text-center capitalize border-2 border-black rounded-md w-full">
                                        @auth
                                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <h1 class="font-bold opacity-0 text-lg">Owner Information</h1>
                                    <label class="block" for="address">Address:</label>
                                    <p id="address"
                                        class="text-center capitalize border-2 border-black rounded-md w-full">
                                        @auth
                                            {{ auth()->user()->address }}
                                        @endauth
                                    </p>
                                </div>
                            </div>


                            <div class="grid grid-flow-row md:grid-flow-col md:gap-10">{{-- document info --}}
                                <div>
                                    <h1 class="font-bold pointer-events-none text-lg">Documents</h1>
                                    <label class="block" for="">Certificate of Ownership:</label>
                                    <input type="file" name="certOfOwner" id="fileToUpload" class="">
                                </div>

                                <div>
                                    <h1 class="font-bold opacity-0 text-lg">Documents</h1>
                                    <label class="block" for="">Cert. of Transfer of Large Cattle:</label>
                                    <input type="file" name="certOfTransfer" id="fileToUpload" class="">
                                </div>
                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                <div class="space-y-8">
                                    <div>
                                        <h1 class="font-bold text-lg">Animal Information</h1>
                                        <label class="block" for="">Kind of Animal:</label>

                                        <p class=" border-2 border-black rounded-md text-center uppercase ">
                                            {{ $animal->type }}</p>
                                    </div>
                                    <div class="flex gap-8">
                                        <div>
                                            <label class="block" for="">Gender:</label>

                                            <p class=" border-2 border-black rounded-md text-center uppercase px-1">
                                                {{ $animal->gender }}</p>
                                        </div>
                                        <div>
                                            <label class="block" for="">Age:</label>

                                            <p class="border-2 border-black rounded-md max-w-max text-center px-1">
                                                {{ $animal->age }}mos.</p>
                                        </div>
                                        <div>
                                            <label class="block" for="">Live Wt.</label>
                                            <p class="border-2 border-black rounded-md text-center max-w-max px-1">
                                                {{ $animal->live_weight }}kg.</p>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block" for="">Destination:</label>

                                        <p class="border-2 border-black rounded-md w-full text-center uppercase">
                                            {{ $animal->destination }}
                                        </p>
                                    </div>

                                </div>

                                <div class="space-y-8">
                                    <div>
                                        <h1 class="font-bold opacity-0 text-lg">Animal Information</h1>
                                        <label class="block" for="">Butcher:</label>

                                        <p class="border-2 border-black rounded-md [300px] text-center capitalize">
                                            {{ $animal->butcher }}</p>
                                    </div>

                                    <div class="flex justify-between gap-3">
                                        <div class=" gap-2" id="ageClassifyDiv">
                                            <div><label for="">Age Classification</label></div>

                                            <p
                                                class="border-2 border-black rounded-md w-full text-center uppercase px-1">
                                                {{ $animal->age_classify }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between gap-3">
                                        <div class=" gap-2">
                                            <div><label
                                                    class="uppercase text-red-700 font-extrabold text-2xl">{{ $animal->status }}</label>
                                            </div>

                                            <p
                                                class="border-2 border-black rounded-md w-full text-center uppercase px-1 p-4">

                                                {{ $animal->remarks }}
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <div class="absolute bottom-0 right-3 mb-[-60px]">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Register
                                        </button>

                                        <a href="{{ route('client.overview') }}"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Cancel
                                        </a>
                                    </div> --}}


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
