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

<body class="bg-[#D5DFE8] overflow-hidden">

    <div>{{-- wrapperr --}}
        {{-- <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image"> --}}


        {{-- HEADER --}}
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

        </div>
        {{-- end header --}}


        <div class="flex">

            <div class="inline-block">@include('client.layout.sidepanel')</div>
            <div class="flex flex-col">

                {{-- main content --}}

                <section class="flex">{{-- wrapper --}}

                    <section class="px-8 bg-[#293241] border-l border-t h-full text-white">
                        <h1 class="pb-6 pt-3 text-2xl font-semibold ">REGISTRATION DETAILS</h1>
                        <div class="flex flex-row gap-10">


                            <div class="space-y-5">
                                <div>
                                    <label class="block" for="">Owner Name:</label>
                                    <p class="bg-white w-full t text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Address:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ auth()->user()->address }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Certificate of Ownership:</label>
                                </div>

                                <div>
                                    <label class="block" for="">Cert. of Transfer of Large Cattle:</label>
                                </div>
                            </div>


                            <div class="space-y-5">
                                <div>
                                    <label class="block" for="">Animal:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->type }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Butcher:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->butcher }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Destination:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->destination }}
                                        @endauth
                                    </p>
                                </div>

                            </div>

                            <div class="space-y-5">

                                <div>
                                    <label class="block" for="">Gender:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->gender }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Age:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold capitalize p-1 rounded-sm">
                                        @auth
                                            {{ $animal->age }} mos.
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block" for="">Live wt.</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold capitalize p-1 rounded-sm">
                                        @auth
                                            {{ $animal->live_weight }} kg.
                                        @endauth
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-32 ">
                                <div>
                                    <label class="block" for="">Age Classification (swine only):</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold capitalize p-1 rounded-sm">
                                        @auth
                                            {{ $animal->age_classify !== null && $animal->age_classify !== '' ? $animal->age_classify : 'None' }}
                                        @endauth
                                    </p>
                                </div>
                                <div class="flex justify-end gap-3 pb-1">
                                    <form action="{{ route('archive.form', ['id' => $animal->id]) }}" method="post">
                                        @csrf
                                        @if ($animal->status != 'archived')
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center gap-1">
                                                <box-icon name='archive-in'
                                                    color='#ffffff'></box-icon><span>Archive</span>
                                            </button>
                                        @endif
                                    </form>

                                    <a href="{{ route('client.edit.animal.form', ['id' => $animal->id]) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                        <box-icon name='pencil' color='#ffffff'></box-icon><span>Edit</span>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </section>

                    {{--  --}}
                    <div
                        class="ml-10 mt-3 pr-30 h-[280px] bg-white px-10 py-3 rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border space-y-5">
                        <div class=" text-[#293241]">
                            <h1 class="font-semibold text-xl ">Status: <span
                                    class="uppercase">{{ $animal->status }}</span>
                            </h1>
                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Form No:<span class="uppercase"></span>
                            </h1>
                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Time of Slaughter: <span class="uppercase"></span></h1>
                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Register Date: <span
                                    class="uppercase">{{ $animal->created_at }}</span></h1>
                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Remarks: <span
                                    class="uppercase">{{ $animal->remarks }}</span>
                            </h1>
                        </div>
                    </div>


                </section>{{-- end wrapper --}}

                <div class="ml-5 mt-5 w-full mx-auto bg-white  rounded-sm">
                    <h1 class="text-center font-semibold text-[#293241] pb-8 pt-2 text-2xl">Animal Marks</h1>

                </div>

            </div>

        </div>

    </div>



    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        sidePanel();
        dropDown();
    </script>

</body>

</html>
