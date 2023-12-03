<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Butcher View Form'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('butcher.layout.butcher-header')
        {{-- end header --}}


        @include('form.view-animal-form')

        {{-- this is for the table inside --}}



        {{-- <nav id="remarks-pop-up"
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
        </nav> --}}

        {{-- <nav id="approve-pop-up"
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
        </nav> --}}

    </div>
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
