<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Receive registration</title>
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


                    <section class="bg-white h-full w-full ml-4 rounded-2xl my-10 drop-shadow-2xl ">
                        <h1 class="py-14 text-2xl font-bold text-center text-[#293241]">REGISTRATION DETAILS</h1>
                        <div class="flex flex-row gap-10 px-10">

                            <div class="space-y-5 w-full px-6">
                                <div>
                                    <label class="block pb-1" for="">Owner Name:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm border-2  border-black">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Address:</label>
                                    <p
                                        class="bg-white text-[#484848] font-semibold capitalize p-1 rounded-sm border-2 border-black">
                                        {{ $user->address }}
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
                                @if ($animal->status != 'approved' && $animal->status != 'rejected')
                                    @csrf

                                    <a id="show-approve-nav"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                        <box-icon name='checkbox-checked'
                                            color='#ffffff'></box-icon><span>Approve</span>
                                    </a>



                                    <a id="show-remarks"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        REJECT
                                    </a>
                                @else
                                    <a href="{{ route('admin.view.animal.reg.list') }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                        <box-icon name='left-arrow-alt' color='#ffffff'></box-icon><span>Back</span>
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
                            @elseif ($animal->status == 'rejected') color: red; @endif
                        ">{{ $animal->status }}</span>
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


        <nav id="remarks-pop-up"
            class="hidden fixed bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl">
            <form method="post" action="{{ route('reject.status', ['id' => $animal->id]) }}">
                <div class="p-3">

                    <textarea name="remarks" placeholder="Write a Remarks..." required
                        class="w-full h-[100px]  resize-none border-b-4 rounded-t-xl bg-gray-200 border-blue-500 p-2"></textarea>
                    <h1 class="block font-semibold text-xl py-1">Do you want to <span
                            class="text-red-600 font-semibold">REJECT</span>
                        this?
                    </h1>
                    <div class="py-3 flex justify-center gap-6 mx-auto">

                        @csrf
                        <button class="bg-[#293241] w-24 text-white py-2 rounded">YES</button>

                        <a id="close-remarks" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>

                    </div>
                </div>
            </form>
        </nav>

        <nav id="approve-pop-up"
            class="fixed hidden bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl backdrop-filter ">
            <div class="">
                <h1 class="block font-semibold text-xl py-5">Do you want to <span
                        class="text-green-600 ">APPROVE</span>
                    this?</h1>
                <div class="py-3 flex justify-center gap-6 mx-auto mb-4">
                    <form method="post" action="{{ route('approve.status', ['id' => $animal->id]) }}">
                        @csrf
                        <button class="bg-[#293241] w-24 text-white py-2 rounded ">YES</button>
                    </form>
                    <a id="close-approve" class="bg-[#293241] w-24 text-white py-2 rounded">NO</a>
                </div>
            </div>
        </nav>

        <script src="{{ asset('js/slaughterhouse.js') }}"></script>
        <script>
            rejectRemark();
            approvePopUp();
        </script>
</body>

</html>
