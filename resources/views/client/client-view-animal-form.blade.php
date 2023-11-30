<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'View Form'])

<body class="bg-[#D5DFE8] ">

    <div class="min-h-screen">{{-- wrapperr --}}
        {{-- <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image"> --}}


        {{-- header --}}
        @include('client.layout.client-header')
        {{-- header --}}


        <div class="flex">

            <div class="fixed">@include('client.layout.sidepanel')</div>
            <div class="mx-auto w-full ">

                {{-- main content --}}

                <div class="flex justify-between ml-[240px] pl-1">{{-- wrapper --}}

                    <section class="bg-white h-full w-full ml-4 rounded-2xl my-10 drop-shadow-2xl ">
                        <h1 class="py-14 text-2xl font-bold text-center text-[#293241]">REGISTRATION DETAILS</h1>
                        <div class="flex flex-row gap-10 px-10">

                            <div class="space-y-5 w-full px-6">
                                <div>
                                    <label class="block pb-1" for="">Owner Name:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm border-2  border-black">
                                        @auth
                                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Address:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ auth()->user()->address }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Certificate of Ownership:</label>
                                    <p
                                        class="bg-white  text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        capitalize
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Cert. of Transfer of Large Cattle:</label>
                                    <p
                                        class="bg-white  text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        no file
                                    </p>
                                </div>
                            </div>


                            <div class="space-y-5 w-full">
                                <div>
                                    <label class="block pb-1" for="">Animal:</label>
                                    <p
                                        class="bg-white  text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->type }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Butcher:</label>
                                    <p
                                        class="bg-white  text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->butcher }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Destination:</label>
                                    <p
                                        class="bg-white  text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->destination }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Age Classification (swine only):</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm  border-2 border-black">
                                        @auth
                                            {{ $animal->age_classify !== null && $animal->age_classify !== '' ? $animal->age_classify : '(None)' }}
                                        @endauth
                                    </p>
                                </div>

                            </div>

                            <div class="space-y-5 w-full">

                                <div>
                                    <label class="block pb-1" for="">Gender:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->gender }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Age:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold   p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->age }} mos.
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Live wt.</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold   p-1 rounded-sm border-2 border-black">
                                        @auth
                                            {{ $animal->live_weight }} kg.
                                        @endauth
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-32 ">

                                <div class="flex justify-end gap-3 pb-1">

                                    {{-- --}}

                                </div>

                            </div>

                        </div>

                        <div class="mt-5 w-full bg-white  rounded-sm px-3 mb-6 ">
                            {{-- Mark of animal --}}
                            <h1 class="text-center font-semibold text-[#293241] pb-8 pt-2 text-2xl">Animal Marks</h1>
                            <section class="min-h-[350px] border-dashed border border-black ">
                                <img class="w-full" src="{{ asset('storage/marked-animal/' . $animal->animal_mark) }}"
                                    alt="animal image">
                            </section>
                        </div>

                        <div class="">{{-- buttons --}}

                            <div class="flex gap-3 my-10 pr-10 justify-end">
                                @if ($animal->status === 'pending')
                                    <form action="{{ route('archive.form', ['id' => $animal->id]) }}" method="post">
                                        @csrf

                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center gap-1">
                                            <box-icon name='archive-in' color='#ffffff'></box-icon><span>Archive</span>
                                        </button>

                                    </form>

                                    <a href="{{ route('client.edit.animal.form', ['id' => $animal->id]) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                        <box-icon name='pencil' color='#ffffff'></box-icon><span>Edit</span>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </section>



                    <div>


                        <div
                            class=" mx-4 mt-10 right-1 h-[280px] bg-white px-8 py-3 rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border space-y-5">
                            <div class=" text-[#293241]">
                                <h1 class="font-semibold text-xl ">Status: <span class="uppercase"
                                        style="
                            @if ($animal->status == 'pending') color: orange;
                            @elseif ($animal->status == 'approved') color: green;
                            @elseif ($animal->status == 'rejected') color: red; @endif">{{ $animal->status }}</span>
                                </h1>
                            </div>

                            <div class="text-[#293241]">
                                <h1 class="font-semibold text-xl ">Time of Slaughter: <span class="uppercase"></span>
                                </h1>
                            </div>

                            @if ($animal->status === 'rejected')
                                <div class="text-[#293241]">
                                    <h1 class="font-semibold text-xl pb-2">Remarks:</h1>

                                    <p class="uppercase font-semibold border-2  border-black w-full p-2 bg-white">
                                        {{ $animal->remarks }}
                                    </p>

                                </div>
                            @endif
                        </div>

                        <div
                            class=" mx-4 mt-10 right-1 h-[280px] bg-white px-8 py-3 rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border space-y-5">
                            <div class=" text-[#293241]">

                                <div class="text-[#293241] text-center">
                                    <h1 class="font-semibold text-xl ">Qr code:<span class="uppercase"></span></h1>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
