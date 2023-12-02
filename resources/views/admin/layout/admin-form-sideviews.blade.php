<div>

    @if ($animal->qr_code !== null)
        @csrf
        <div
            class="mx-4 mt-10 h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border">
            <div class=" text-[#293241]">

                <div class="text-[#293241] text-center">

                    <div class="">
                        <img class="mx-auto" src="{{ asset('storage/qr-code/' . $animal->qr_code) }}" alt="animal image">
                    </div>
                </div>

            </div>
        </div>
    @endif


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
        @if ($animal->arrived_at !== null)
            @csrf
            <div class="text-[#293241]">
                <h1 class="font-semibold text-xl ">Arrival Time:</h1>
                <p>{{ $animal->arrived_at }}</p>

            </div>
        @else
            <div class="text-[#293241]">
                <h1 class="font-semibold text-xl ">Arrival Time:</h1>
                <p class="text-xl">(Not Arrived)</p>

            </div>
        @endif

        @if ($animal->scheduled_at !== null)
            @csrf
            <div class="text-[#293241]">
                <h1 class="font-semibold text-xl ">Slaughter Time:</h1>
                <p>{{ $animal->scheduled_at }}</p>

            </div>
        @else
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
