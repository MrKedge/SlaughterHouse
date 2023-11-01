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

<body class="bg-[#D5DFE8] h-full w-full">

    <div>
        <div class="fixed bg-white top-0 w-screen h-[40px] ml-[240px] pr-[240px]">
            {{-- header --}}
            @auth
                <p class="font-extrabold capitalize px-4 pt-2 justify-end flex text-[#293241] ">
                    {{ auth()->user()->first_name }}
                </p>
            @endauth



        </div>
        <div class="fixed left-0 h-full w-[240px] bg-[#293241] text-white">
            <header class="text-center py-8  font-bold">

                <h1><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </header>
            <a href="{{ route('client.overview') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='home' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">HOME</h1>
                </div>
            </a>
            <a href="">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='pencil' type='solid'
                            color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">REGISTER ANIMAL</h1>
                </div>
            </a>
            <a href="{{ route('client.animal.list.register') }}">
                <div class="relative">
                    <span class="absolute left-8"><box-icon name='list-ul' color='#ffffff'></box-icon></span>
                    <h1 class="my-6 pl-[65px]">LIST OF ANIMAL</h1>
                </div>
            </a>
            <hr class="mx-auto w-3/4">
        </div>
        {{-- this is for the table inside --}}
        <section class=" flex justify-center items-center ml-[240px] pt-[80px] h-screen">
            <div class="bg-white w-[750px] h-[550px]">
                <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">REGISTRATION</h1>
                <form action="{{ route('store.animal') }}" method="POST" class="flex justify-center relative">
                    @csrf

                    <div class="flex gap-3">
                        <div>
                            <div>
                                <div class="pl-3">
                                    <h1 class="font-bold">Owner Information</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">

                                <div class="flex justify-between gap-3">
                                    <div class=" gap-2">
                                        <div><label for="">Owner Name</label></div>
                                        <div><input type="text" name="ownerName"
                                                @auth
value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" @endauth
                                                class="bg-gray-200 w-[300px] text-center capitalize">
                                        </div>
                                    </div>
                                    <div class=" gap-2">
                                        <div><label for="">Address</label></div>
                                        <div><input type="text" name="address"
                                                @auth
value="{{ auth()->user()->address }}" @endauth
                                                class="bg-gray-200 w-[300px] text-center capitalize">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pl-3">
                                    <h1 class="font-bold">Documents</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">
                                <div class="flex gap-14">
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Certificate of Ownership</label></div>
                                        <div><input type="file" name="certOfOwner" id="fileToUpload" class="">
                                        </div>
                                    </div>
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Cert. of Transfer of Large Cattle</label></div>
                                        <div><input type="file" name="certOfTransfer" id="fileToUpload"
                                                class="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div class="pl-3 mb-4">
                                    <h1 class="font-bold">Animal Information</h1>
                                </div>
                            </div>
                            <div class="pl-3 mb-4">
                                <div class="flex gap-14">
                                    <div class="gap-2 w-[300px]">
                                        <div><label for="">Kind of Animal</label></div>
                                        <select name="kindOfAnimal" id="" required class="bg-gray-200 gap-3">
                                            <option value="" disabled selected>select</option>
                                            <option value="cow">Cow</option>
                                            <option value="goat">Goat</option>
                                            <option value="horse">Horse</option>
                                            <option value="swine">Swine</option>
                                            <option value="carabao">Carabao</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div><label for="">Butcher</label></div>
                                        <select name="butcher" id="" required
                                            class="bg-gray-200 gap-3 [300px]">
                                            <option value="" disabled selected>select</option>
                                            <option value="butcher1">butcher1</option>
                                            <option value="butcher2">butcher2</option>
                                            <option value="butcher3">butcher3</option>
                                            <option value="private">PRIVATE</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="pl-3 mb-4">

                                <div class="flex justify-between gap-3">
                                    <div class=" gap-2">
                                        <div><label for="">Age Classification</label></div>
                                        <select name="ageClassify" id="" required
                                            class="bg-gray-200 gap-3 [300px]">
                                            <option value="" disabled selected>select</option>
                                            <option value="fattener">Fattener</option>
                                            <option value="grower">Grower</option>
                                            <option value="culled sow/boar">Culled sow/boar</option>
                                        </select>
                                    </div>
                                    <div class=" gap-2 w-[300px]">
                                        <div><label for="">Destination</label></div>
                                        <select name="destination" id="" required class="bg-gray-200 gap-3">
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
                            </div>
                            <div class="gap-3">
                                <div class="flex justify-between">
                                    <div class="flex">
                                        <div class="pl-3">
                                            <div><label for="">Gender</label></div>
                                            <div><select name="gender" id="" required
                                                    class="bg-gray-200 gap-3">
                                                    <option value="" disabled selected>select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select></div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Age</label></div>
                                            <div><input type="number" name="age" required
                                                    class="bg-gray-200 w-12  ">
                                            </div>
                                        </div>
                                        <div class="pl-3">
                                            <div><label for="">Live Weight</label></div>
                                            <div><input type="number" name="liveWeight" required
                                                    class="bg-gray-200 w-24">
                                            </div>
                                        </div>

                                    </div>

                                    <div>

                                    </div>
                                </div>

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
                </form>
            </div>
        </section>
    </div>


</body>

</html>
