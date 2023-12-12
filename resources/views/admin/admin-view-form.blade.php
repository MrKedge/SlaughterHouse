<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'View Form'])

<body class="bg-[#D5DFE8] ">

    <div class="min-h-screen w-full">{{-- wrapper --}}


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
                        <h1 class="py-14 text-2xl font-bold text-center text-[#293241]">ANIMAL DETAILS</h1>
                        <div class="flex flex-row gap-10 px-10">

                            <div class="space-y-5 w-full">

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

                            </div>


                            <div class="space-y-5 w-full">


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
                                    <label class="block pb-1" for="">Certificate of Ownership:</label>
                                    <section class="w-[100px] p-1 border-dashed border border-black"
                                        data-lightbox="animal-gallery" data-title="Animal Image">
                                        <a href="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                            data-lightbox="animal-gallery">
                                            <img class=""
                                                src="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                alt="animal image">
                                        </a>
                                    </section>
                                </div>

                                <div>
                                    @if ($animal->cert_transfe !== null)
                                        <label class="block pb-1" for="">Cert. of Transfer of Large
                                            Cattle:</label>
                                        <section class="w-[100px] p-1 border-dashed border border-black"
                                            data-lightbox="animal-gallery" data-title="Animal Image">
                                            <a href="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                                                data-lightbox="animal-gallery">
                                                <img class=""
                                                    src="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                                                    alt="animal image">
                                            </a>
                                        </section>
                                    @endif
                                </div>

                                <div>
                                    <label class="block pb-1" for="">Permit to Slaughter:</label>
                                    <section class="w-[100px] p-1 border-dashed border border-black"
                                        data-lightbox="animal-gallery" data-title="Animal Image">
                                        <a href="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                            data-lightbox="animal-gallery">
                                            <img class=""
                                                src="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                                alt="animal image">
                                        </a>
                                    </section>
                                </div>

                            </div>

                            <div class="space-y-32 ">

                                <div class="flex justify-end gap-3 pb-1">

                                    {{-- --}}

                                </div>

                            </div>

                        </div>
                        @if ($animal->status === 'approved' || $animal->status === 'pending')
                            @csrf
                            <div class="mt-5 w-full bg-white  rounded-sm px-3 mb-6 ">
                                {{-- Mark of animal --}}
                                <h1 class="text-center font-semibold text-[#293241] pb-8 pt-2 text-2xl">Animal Marks
                                </h1>
                                <section class="min-h-[350px] border-dashed border border-black ">
                                    <img class="w-full"
                                        src="{{ asset('storage/marked-animal/' . $animal->animal_mark) }}"
                                        alt="animal image">
                                </section>
                            </div>
                        @endif
                        <div class="">{{-- buttons --}}



                            <div class="flex my-10 pr-10 justify-end gap-3">
                                @if ($animal->status === 'inspection')
                                    @csrf
                                    @if ($animal->anteMortem->inspection_status === null)
                                        <div class="flex">
                                            <div class="flex  m-5">
                                                <button id="toggle-schedule"
                                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                    For Slaughter
                                                </button>
                                            </div>


                                            <div class="flex  m-5">
                                                <button id="updateProductButton" data-modal-target="updateProductModal"
                                                    data-modal-toggle="updateProductModal"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                    type="button">
                                                    Dispose Animal
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endif


                                @if ($animal->status === 'pending')
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
                                @elseif($animal->status === 'inspection')
                                    <form action="{{ route('for.slaughter.animal', ['id' => $animal->id]) }}"
                                        method="post">
                                        @csrf
                                    </form>
                                @endif

                            </div>

                        </div>
                    </section>

                    @include('admin.layout.admin-form-sideviews')

                </div>
            </div>
        </div>



    </div>
    @include('admin.formhandler.form-popup')

</body>

</html>
