<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register animal</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] ">

    <div> {{-- wrapper --}}

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

                            <div class="grid grid-flow-row  md:grid-flow-col md:gap-10">{{-- owner info --}}
                                <div class="">
                                    <h1 class="font-bold pointer-events-none text-lg">Owner Information</h1>

                                    <label class="block" for="ownerName">Owner Name:</label>

                                    <p id="ownerName"
                                        class="text-center capitalize border-2 border-black rounded-md w-full ">
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
                                        <select name="kindOfAnimal" id="typeOfAnimal" required
                                            class=" border-2 border-black rounded-md">
                                            <option value="" disabled selected>select</option>
                                            <option value="cow">Cow</option>
                                            <option value="goat">Goat</option>
                                            <option value="horse">Horse</option>
                                            <option value="swine">Swine</option>
                                            <option value="carabao">Carabao</option>
                                        </select>
                                    </div>
                                    <div class="flex gap-8">
                                        <div>
                                            <label class="block" for="">Gender:</label>
                                            <select name="gender" id="" required
                                                class="border-2 border-black rounded-md w-full">
                                                <option value="" disabled selected>select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block" for="">Age:</label>
                                            <input type="number" name="age" required min="0"
                                                class="border-2 border-black rounded-md w-12  ">
                                            <label for="">mos.</label>
                                        </div>
                                        <div>
                                            <label class="block" for="">Live Wt.</label>
                                            <input type="number" name="liveWeight" required min="0"
                                                class="border-2 border-black rounded-md w-12">
                                            <label for="">kg.</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block" for="">Destination:</label>
                                        <select name="destination" id="" required
                                            class="border-2 border-black rounded-md w-full">
                                            <option value="" disabled selected>select</option>
                                            <option value="wet market">Wet Market</option>
                                            <option value="meat shops">Meat Shops</option>
                                            <option value="meat cutting">Meat Cutting</option>
                                            <option value="hotel and restaurants">Hotel and Restaurants</option>
                                            <option value="super market">Super Market</option>
                                            <option value="meat processing plant">Meat Processing Plant</option>
                                            <option value="cold storage">Cold Storage</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="space-y-8">
                                    <div>
                                        <h1 class="font-bold opacity-0 text-lg">Animal Information</h1>
                                        <label class="block" for="">Butcher:</label>
                                        <select name="butcher" id="" required
                                            class="border-2 border-black rounded-md [300px]">
                                            <option value="" disabled selected>select</option>
                                            <option value="butcher1">butcher1</option>
                                            <option value="butcher2">butcher2</option>
                                            <option value="butcher3">butcher3</option>
                                            <option value="private">PRIVATE</option>

                                        </select>
                                    </div>

                                    <div class="flex justify-between gap-3">
                                        <div class=" gap-2 hidden" id="ageClassifyDiv">
                                            <div><label for="">Age Classification</label></div>
                                            <select name="ageClassify" id="putAgeClassify"
                                                class="border-2 border-black rounded-md w-full">
                                                <option value="" disabled selected>select</option>
                                                <option value="fattener">Fattener</option>
                                                <option value="grower">Grower</option>
                                                <option value="culled sow/boar">Culled sow/boar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 right-3 mb-[-60px]">
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
