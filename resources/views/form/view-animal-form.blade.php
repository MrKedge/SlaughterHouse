<div class="flex">

    <div class="fixed">@include('butcher.layout.butcher-panel')</div>
    <div class="mx-auto w-full">

        {{-- main content --}}

        <div class="ml-[240px] flex justify-between">

            @if (session('success'))
                <div class="flex justify-center items-center h-full">
                    <h1 class="alert alert-success text-green-700">
                        {{ session('success') }}
                    </h1>
                </div>
            @endif
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
                            <p class="bg-white text-[#484848] font-semibold   p-1 rounded-sm border-2 border-black">
                                @auth
                                    {{ $animal->age }} mos.
                                @endauth
                            </p>
                        </div>

                        <div>
                            <label class="block pb-1" for="">Live wt.</label>
                            <p class="bg-white text-[#484848] font-semibold   p-1 rounded-sm border-2 border-black">
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

                    @if ($animal->status !== 'slaughtered' && $animal->status !== 'for slaughter')
                        <h1 class="text-center font-semibold text-[#293241] pb-8 pt-2 text-2xl">Animal Marks</h1>
                        <section class="min-h-[350px] border-dashed border border-black ">
                            <img class="w-full" src="{{ asset('storage/marked-animal/' . $animal->animal_mark) }}"
                                alt="animal image">
                        </section>
                    @endif

                    <div class="">{{-- buttons --}}

                        <div class="flex gap-3 my-10 pr-10 justify-end">
                            @if ($animal->status === 'for slaughter' && auth()->user()->role === 'butcher')
                                {{-- Slaughtered button --}}
                                <form action="{{ route('butcher.slaughter.animal', ['id' => $animal->id]) }}"
                                    method="post">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                        <box-icon name='checkbox-checked' color='#ffffff'></box-icon>
                                        <span>SLAUGHTERED</span>
                                    </button>
                                </form>
                            @elseif(auth()->user()->role === 'butcher' && $animal->status === 'slaughtered')
                                <p class="text-red-700">Animal cannot be slaughtered at this time.</p>
                            @endif

                            @if ($animal->post_mortem === 'null' && $animal->status == 'slaughtered' && auth()->user()->role === 'inspector')
                                <button id="good-btn"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                    <box-icon name='checkbox-checked' color='#ffffff'></box-icon><span>Good</span>
                                </button>

                                <button id="condemn-btn"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                    <i class='bx bxs-error text-white'></i><span>Condemn</span>
                                </button>
                            @endif
                        </div>

                    </div>
            </section>



            <div>

                <div
                    class="mx-4 mt-10 h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border">
                    <div class=" text-[#293241]">

                        <div class="text-[#293241] text-center">

                            <div class="">
                                <img class="mx-auto" src="{{ asset('storage/qr-code/' . $animal->qr_code) }}"
                                    alt="animal image">
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="pl-4 mx-4 w-[250px] mt-10 h-auto bg-white px-1 py-3 rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border space-y-5">
                    <div class=" text-[#293241]">
                        <h1 class="font-semibold text-xl">Status: <span class="uppercase"
                                style="
                    @if ($animal->status == 'pending') color: orange;
                    @elseif ($animal->status == 'approved') color: green;
                    @elseif ($animal->status == 'rejected') color: red; @endif
                ">{{ $animal->status }}</span>
                        </h1>
                    </div>
                    @if ($animal->scheduled_at !== null && $animal->arrived_at !== null)
                        @csrf
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Arrival Time:</h1>
                            <p>{{ $animal->arrived_at }}</p>

                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Slaughter Time:</h1>
                            <p>{{ $animal->scheduled_at }}</p>

                        </div>
                    @else
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Arrival Time:</h1>
                            <p class="text-xl">(Not Arrived)</p>

                        </div>
                        <div class="text-[#293241]">
                            <h1 class="font-semibold text-xl ">Slaughter Time:</h1>
                            <p class="text-xl">(No Schedule)</p>

                        </div>
                    @endif
                    @if ($animal->status === 'rejected')
                        <div class="text-[#293241] mr-2">
                            <h1 class="font-semibold text-xl pb-2">Remarks:</h1>

                            <p class="uppercase font-semibold border-2  border-black w-full p-2 bg-white">
                                {{ $animal->remarks }}
                            </p>

                        </div>
                    @endif
                </div>

            </div>



        </div>

    </div>

</div>

<div id="good-popup"
    class="fixed hidden bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl backdrop-filter ">
    <div class="">
        <h1 class="block font-semibold text-xl py-5">Do you want to mark the animal as Good?</h1>
        <div class="py-3 flex justify-center gap-6 mx-auto mb-4">
            <form method="post" action="{{ route('inspector.postmortem.good', ['id' => $animal->id]) }}">
                @csrf
                <button
                    class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">YES</button>
            </form>
            <a id="hide-good"
                class="cursor-pointer  text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">NO</a>
        </div>
    </div>
</div>

<div id="condemn-popup"
    class="fixed hidden bg-white w-[400px] h-auto text-center rounded-md border left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2  shadow-2xl backdrop-filter ">
    <div class="">
        <h1 class="block font-semibold text-xl py-5 px-">Do you want to mark the animal as Condemned?</h1>
        <div class="py-3 flex justify-center gap-6 mx-auto mb-4">
            <form method="post" action="{{ route('inspector.condemn.animal', ['id' => $animal->id]) }}">
                @csrf
                <button
                    class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">YES</button>
            </form>
            <a id="close-condemn"
                class="cursor-pointer  text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">NO</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var goodBtn = document.getElementById('good-btn');
        var goodPopup = document.getElementById('good-popup');
        var hideBtn = document.getElementById('hide-good');

        goodBtn.addEventListener('click', function() {
            goodPopup.classList.toggle('hidden');
        });

        hideBtn.addEventListener('click', function() {
            goodPopup.classList.add('hidden');
        });

    });

    document.addEventListener('DOMContentLoaded', function() {
        var condemnBtn = document.getElementById('condemn-btn');
        var goodPopup = document.getElementById('condemn-popup');
        var hideBtn = document.getElementById('close-condemn');

        condemnBtn.addEventListener('click', function() {
            goodPopup.classList.toggle('hidden');
        });

        hideBtn.addEventListener('click', function() {
            goodPopup.classList.add('hidden');
        });

    });
</script>
