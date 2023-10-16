<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body>
    <main class=" bg-[#D5DFE8]">
        <div class="w-[240px] fixed bg-[#293241] h-full text-white">
            <div class="">
                <header class="text-center py-8 relative font-bold">
                    <img src="{{ asset('images/butcher-logo-icon.png') }}" alt="image"
                        class="z-40 absolute  top-2 p-1">
                    <h1><span class="text-[#EE6C4D] pl-10">SLAUGHTER</span>HOUSE</h1>
                </header>
            </div>
            <div>
                <a href="">
                    <img src="{{ asset('images/dashboard-white-icon.png') }}" alt="image"
                        class="absolute right-[180px] w-[]">
                    <h1 class="my-6 pl-[65px]">DASHBOARD</h1>
                </a>
            </div>
            <div class="pl-16 my-8">
                <div class="relative">
                    <a href="">
                        <img src="{{ asset('images/register-white-icon.png') }}" alt="image"
                            class="absolute right-[180px] w-[]">
                        <h1 class="my-6">REGISTRATION</h1>
                    </a>
                </div>
                <div>
                    <a href="">
                        <img src="{{ asset('images/cow-animal-white-icon.png') }}" alt="image"
                            class="absolute right-[180px] w-[]">
                        <h1 class="my-6">ANIMAL</h1>
                    </a>
                </div>

            </div>

            <div class="pl-16 my-8">

            </div>

            <div class="pl-16 my-8">

            </div>
            <hr class="mx-auto w-3/4">
        </div>
        <div class="ml-[240px] h-[40px] bg-white z-10 flex justify-start">
            <div class="px-4 pt-2 font-extrabold text-[#0E7BBB]">
                <h1>OWNER</h1>
            </div>
            <form action="" class="flex relative">
                <input type="text" placeholder="Search..."
                    class="rounded-2xl m-0 my-2 border-gray-700 border p-1 text-center">
                <div class="p-2 pl-1">
                    <button>
                        <img src="{{ asset('images/search-icon.png') }}" alt="Image" class="absolute top-2">
                    </button>
                </div>
            </form>
        </div>

        <div class="flex justify-start ml-[240px] m-10 mb-5">
            <div
                class="h-40 bg-white w-[250px] ml-10 rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative mr-8">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">PENDING</h1>

                    <img src="{{ asset('images/register-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px] ">
                </a>
            </div>
            <div
                class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative mr-8">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">ANIMAL</h1>

                    <img src="{{ asset('images/cow-animal-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px] w-[64px]">
                </a>
            </div>
            <div class="h-40 bg-white w-[250px] rounded-r-2xl border-l-[16px] border-[#EE6C4D] rounded-l-2xl relative">
                <a href="">
                    <h1 class="pl-8 pt-4 text-[#EE6C4D] font-bold">APPROVED</h1>
                    <img src="{{ asset('images/approved-icon.png') }}" alt="image"
                        class="z-40 absolute right-[10px] top-[5px]">
                </a>
            </div>
        </div>4
        <div class="flex justify-center">
            <div class="h-[400px] w-[1200px] bg-white  ml-[240px] rounded-2xl  mb-[55px]">
                <header class="font-extrabold p-4 text-[#EE6C4D]">SCHEDULE OF SLAUGHTER</header>
                <div>
                    <table class="w-full text-center p-11">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>No. of Animals</th>
                                <th>Schedule of Slaughter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-10-16</td>
                                <td>10</td>
                                <td>Morning</td>
                                <td><button>Details</button></td>
                            </tr>
                            <tr>
                                <td>2023-10-17</td>
                                <td>15</td>
                                <td>Afternoon</td>
                                <td><button>Details</button></td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </main>
</body>

</html>
