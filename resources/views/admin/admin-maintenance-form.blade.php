<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Form Maintenance</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}




        {{-- this is for the table inside --}}
        <div class="flex">

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>
            <div class="mx-auto w-full">

                {{-- main content --}}

                <div class="ml-[240px] flex justify-between">


                    <section class="flex flex-col h-full pt-8 w-full mx-6">


                        <div class=" bg-white px-10 rounded-2xl  shadow-2xl py-6">
                            <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">FORM MAINTENANCE

                            </h1>
                            <div action="" class="flex w-full justify-center relative">

                                <div class="w-full">
                                    <div class="scrollbar-gutter pr-5 pb-20 overflow-y-auto h-[500px] space-y-10">

                                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                            <form action="{{ route('form.maintenance') }}" method="POST">
                                                @csrf
                                                <div class="space-y-8">
                                                    <div>
                                                        <h1 class="font-bold text-lg italic">For Adding Animal
                                                            Information
                                                        </h1>
                                                        <label class="block pb-1 pt-3" for="">Add
                                                            Animal:</label>
                                                        <input name="animalType"
                                                            class=" border-2 border-black rounded-md p-2 w-full">


                                                    </div>
                                                    {{-- <div>
                                                        <label class="block pb-1" for="">Set Age Limit:
                                                            (Months)</label>
                                                        <input type="number" name="age" min="0"
                                                            class="border-2 border-black rounded-md p-2 w-full">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Set Live Weight Limit
                                                            (Kilogram)</label>
                                                        <input type="number" name="liveWeight" min="0"
                                                            class="border-2 border-black rounded-md p-2 w-full">

                                                    </div> --}}


                                                    <div>
                                                        <label class="block pb-1" for="">Add
                                                            Destination:</label>
                                                        <input name="animalDestination"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Add Butcher:</label>
                                                        <input name="animalButcher"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>

                                                    <div>
                                                        <label class="block pb-1" for="">Add Age
                                                            Classification:</label>
                                                        <input name="animalAgeClassify"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>

                                                    <div class="absolute bottom-0 right-[180px] pb-[20px]">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            Add on Form
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="{{ route('delete.on.form') }}" method="post">
                                                @csrf
                                                <div class="space-y-8">

                                                    <div>
                                                        <h1 class="font-bold text-lg italic">For Tampering Animal
                                                            Information</h1>
                                                        <label class="block pb-1 pt-3" for="">Delete on
                                                            Animal:</label>
                                                        <input name="deleteAnimal"
                                                            class=" border-2 border-black rounded-md p-2 w-full">


                                                    </div>
                                                    {{-- <div>
                                                        <label class="block pb-1" for="">Set Age Limit:
                                                            (Months)</label>
                                                        <input type="number" name="age" min="0"
                                                            class="border-2 border-black rounded-md p-2 w-full">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Set Live Weight Limit
                                                            (Kilogram)</label>
                                                        <input type="number" name="liveWeight" min="0"
                                                            class="border-2 border-black rounded-md p-2 w-full">

                                                    </div> --}}
                                                    <div>

                                                        <label class="block pb-1" for="">Delete on
                                                            Destination:</label>
                                                        <input name="deleteDestination"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Delete on
                                                            Butcher:</label>
                                                        <input name="deleteButcher"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>

                                                    <div>
                                                        <label class="block pb-1" for="">Delete on Age
                                                            Classification:</label>
                                                        <input name="deleteAgeClassify"
                                                            class="border-2 border-black rounded-md w-full p-2">
                                                    </div>

                                                    <div class="absolute bottom-0 right-5 pb-[20px]">
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                            Delete on Form
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>


                                        </div>

                                        <div class="space-y-8">


                                            {{-- <div class="absolute bottom-0 right-5 pb-[20px]">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Update Form
                                                </button>

                                                <a href="{{ route('admin.dashboard') }}"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Cancel
                                                </a>
                                            </div> --}}
                                        </div>

                                    </div>


                                    <div class="flex justify-center">


                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                </section>



                <div>

                    <div
                        class="mx-4 mt-10 h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border">
                        <div class=" text-[#293241]">

                            <div class="text-[#293241] text-center">


                            </div>

                        </div>
                    </div>

                </div>



            </div>

        </div>

    </div>


</body>

</html>
