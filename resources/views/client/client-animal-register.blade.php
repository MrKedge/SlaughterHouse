<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register animal</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden ">


    <div class="min-h-screen w-screen "> {{-- wrapper --}}



        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div
                class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <p class="font-extrabold capitalize px-4 text-[#293241] ">
                        {{ auth()->user()->first_name }}
                    </p>
                @endauth
            </div>
        </div> {{-- end header --}}


        {{-- main content --}}
        <div class="flex w-full">


            <div class=""> @include('client.layout.sidepanel')</div>


            <section class="flex flex-col h-full pt-8 w-full mx-6">


                <div class=" bg-white px-10 rounded-2xl  shadow-2xl py-6">
                    <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION
                    </h1>
                    <form action="{{ route('store.animal') }}" method="POST"
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
                                        <label class="block pb-1 pt-3" for="">Certificate of Ownership:</label>
                                        <input type="file" name="certOfOwner" id="fileToUpload" class="">
                                    </div>

                                    <div>
                                        <h1 class="font-bold opacity-0 text-lg">Documents</h1>
                                        <label class="block pb-1 pt-3" for="">Cert. of Transfer of Large
                                            Cattle:</label>
                                        <input type="file" name="certOfTransfer" id="fileToUpload" class="">
                                    </div>
                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                    <div class="space-y-8">
                                        <div>
                                            <h1 class="font-bold text-lg italic">Animal Information</h1>
                                            <label class="block pb-1 pt-3" for="">Animal:</label>
                                            <select name="kindOfAnimal" id="typeOfAnimal" required
                                                class=" border-2 border-black rounded-md p-2 w-full">
                                                <option value="" disabled selected>select</option>
                                                <option value="cow">Cow</option>
                                                <option value="goat">Goat</option>
                                                <option value="horse">Horse</option>
                                                <option value="swine">Swine</option>
                                                <option value="carabao">Carabao</option>
                                            </select>
                                        </div>
                                        <div class="flex justify-evenly gap-3">
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Gender:</label>
                                                <select name="gender" id="" required
                                                    class="border-2 border-black rounded-md p-2">
                                                    <option value="" disabled selected>select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Age: (Months)</label>
                                                <input type="number" name="age" required min="0"
                                                    class="border-2 border-black rounded-md p-2">
                                            </div>
                                            <div>
                                                <label class="block pb-1 pt-3" for="">Live Wt.
                                                    (Kilogram)</label>
                                                <input type="number" name="liveWeight" required min="0"
                                                    class="border-2 border-black rounded-md p-2">

                                            </div>
                                        </div>

                                        <div>
                                            <label class="block pb-1 pt-3" for="">Destination:</label>
                                            <select name="destination" id="" required
                                                class="border-2 border-black rounded-md w-full p-2">
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
                                            <label class="block pb-1 pt-3" for="">Butcher:</label>
                                            <select name="butcher" id="" required
                                                class="border-2 border-black rounded-md w-full p-2">
                                                <option value="" disabled selected>select</option>
                                                <option value="butcher1">butcher1</option>
                                                <option value="butcher2">butcher2</option>
                                                <option value="butcher3">butcher3</option>
                                                <option value="private">PRIVATE</option>

                                            </select>
                                        </div>

                                        <div class="hidden" id="ageClassifyDiv">
                                            <label for="" class="block pb-1 pt-3">Age Classification:</label>
                                            <select name="ageClassify" id="putAgeClassify"
                                                class="border-2 border-black rounded-md w-full p-2">
                                                <option value="" disabled selected>select</option>
                                                <option value="fattener">Fattener</option>
                                                <option value="grower">Grower</option>
                                                <option value="culled sow/boar">Culled sow/boar</option>
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
                                    {{-- <input type="hidden" id="imageData" name="imageData" value=""> --}}
                                    {{-- <button type="submit">Save Image</button> --}}

                                    <div class="flex justify-center">
                                        <canvas class="border-2 border-black" id="canvas"></canvas>
                                    </div>

                                    <!-- Hidden input to store drawing data -->
                                    <input type="hidden" name="drawingData" id="drawingData" value="">

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>



    <script>
        var imageUrls = {
            cow: "{{ asset('images/cow.png') }}",
            goat: "{{ asset('images/goat.png') }}",
            horse: "{{ asset('images/horse.png') }}",
            swine: "{{ asset('images/swine.png') }}",
            carabao: "{{ asset('images/carabao.png') }}",
        };
    </script>


    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        sidePanel();
        dropDown();
    </script>
</body>

</html>
