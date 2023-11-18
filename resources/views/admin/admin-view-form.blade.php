<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>Receive registration</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class=""> {{-- wrapper --}}



        <div class="z-10 flex items-center justify-between bg-white h-[50px] sticky top-0">

            <div class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">SLAUGHTER</span>HOUSE</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <a href="#" class="font-extrabold capitalize px-4 text-[#293241] flex items-center gap-1">
                        <div id="open-div"><box-icon type='solid' name='down-arrow' size='14px'></div>
                        </box-icon>
                        <div id="close-div" class="hidden"><box-icon type='solid' name='up-arrow'
                                size='14px'></box-icon>
                        </div>
                        {{ auth()->user()->first_name }}
                    </a>
                @endauth
                <nav id="toggle-settings"
                    class="space-y-4 py-2 h-auto absolute hidden rounded-md shadow-2xl bg-white bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border right-[50px]">
                    <a href="#" id="" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='user-circle'></box-icon>profile</a>
                    <a href="#" id="show-log-out" class="px-6 w-36 gap-2 flex font-bold"><box-icon
                            name='log-out'></box-icon>log-out</a>
                </nav>
            </div>
        </div>




        {{-- this is for the table inside --}}
        <div class="flex ">

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>
            <div class="flex flex-col">

                {{-- main content --}}

                <section class="flex ml-[240px]">{{-- wrapper --}}

                    <section class="px-8 bg-[#293241] border-l border-t h-full text-white">
                        <h1 class="pb-6 pt-3 text-2xl font-semibold ">REGISTRATION DETAILS</h1>
                        <div class="flex flex-row gap-10">


                            <div class="space-y-5">
                                <div>
                                    <label class="block pb-1" for="">Owner Name:</label>
                                    <p class="bg-white w-full t text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Address:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        {{ $user->address }}
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Certificate of Ownership:</label>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Cert. of Transfer of Large Cattle:</label>
                                </div>
                            </div>


                            <div class="space-y-5">
                                <div>
                                    <label class="block pb-1" for="">Animal:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->type }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Butcher:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->butcher }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Destination:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->destination }}
                                        @endauth
                                    </p>
                                </div>

                            </div>

                            <div class="space-y-5">

                                <div>
                                    <label class="block pb-1" for="">Gender:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm">
                                        @auth
                                            {{ $animal->gender }}
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Age:</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold capitalize p-1 rounded-sm">
                                        @auth
                                            {{ $animal->age }} mos.
                                        @endauth
                                    </p>
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Live wt.</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold capitalize p-1 rounded-sm">
                                        @auth
                                            {{ $animal->live_weight }} kg.
                                        @endauth
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-32 ">
                                <div>
                                    <label class="block pb-1" for="">Age Classification (swine only):</label>
                                    <p class="bg-white w-full text-[#484848] font-semibold uppercase p-1 rounded-sm ">
                                        @auth
                                            {{ $animal->age_classify !== null && $animal->age_classify !== '' ? $animal->age_classify : '(None)' }}
                                        @endauth
                                    </p>
                                </div>
                                <div class="flex justify-end gap-3 pb-1">

                                    {{-- --}}

                                </div>

                            </div>

                        </div>

                        <div class="mt-5 w-full mx-auto bg-white  rounded-sm min-h-[350px] mb-6">{{-- Mark of animal --}}
                            <h1 class="text-center font-semibold text-[#293241] pb-8 pt-2 text-2xl">Animal Marks</h1>

                        </div>

                        <div class="">{{-- buttons --}}

                            <div class="flex gap-3 mb-10 justify-end">
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

                    {{--  --}}
                    <div
                        class="fixed ml-10 mt-3 right-1 h-[280px] bg-white px-8 py-3 rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border space-y-5">
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
                            <h1 class="font-semibold text-xl ">Qr code:<span class="uppercase"></span>
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



            </div>

        </div>

    </div>

    <nav id="remarks-pop-up"
        class="hidden fixed bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl backdrop-filter backdrop-blur-lg">
        <form method="post" action="{{ route('reject.status', ['id' => $animal->id]) }}">
            <div class="">

                <textarea name="remarks" placeholder="Enter Remarks..." required
                    class="w-[300px] h-[200px] mt-3 resize-none border-2 border-dashed border-gray-500 p-2"></textarea>
                <h1 class="block font-semibold text-xl py-5">Do you want to <em class="text-red-600">REJECT</em>
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
            <h1 class="block font-semibold text-xl py-5">Do you want to <em class="text-green-600 ">APPROVE</em>
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
