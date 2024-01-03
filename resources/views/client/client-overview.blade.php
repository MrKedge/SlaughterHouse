<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Overview'])

<body class="bg-[#D5DFE8] overflow-hidden ">


    @extends('client.layout.masterlayout')

    @section('content')

        <div class="flex flex-col w-full"> {{-- below header wrapper --}}
            <section class="flex justify-evenly gap-3 py-3 overflow-x-auto w-auto h-auto">
                {{-- wrapper --}}
                <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#293241] rounded-l-md">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'pending')->count() }}</div>

                </div>
                <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#293241] rounded-l-md">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='check-double'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'approved')->count() }}</div>
                </div>
                <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#293241] rounded-l-md">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SCHEDULED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('scheduled_at', '!=', null)->count() }}</div>
                </div>
                <div class="w-[300px] h-28 bg-white rounded-r-md border-l-[16px] border-[#293241] rounded-l-md">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SLAUGHTERED</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        {{ $animals->where('status', 'slaughtered')->count() }}</div>
                </div>
            </section>

            <div class="flex justify-center items-center px-3">

                {{-- table wrapper --}}
                <section class="w-full">
                    <div class="bg-white h-auto rounded-md overflow-y-auto">
                        <h1 class="text-center font-extrabold text-[#293241] pb pt-4 text-2xl">RECENT
                            REGISTRATION
                        </h1>
                        <div class="p-4 ">
                            <div class="scrollbar-gutter flex justify-center relative px-4 max-h-[300px] overflow-y-auto">
                                <table class="w-full text-center">
                                    <thead class="">
                                        <tr>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Animal
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Status
                                            </th>
                                            <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                                Destination
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        @php $index = 1 @endphp

                                        @if ($recent->isEmpty())
                                            <tr>
                                                <td colspan="5" class="py-4 border-b border-black text-center">
                                                    <h1 class="font-semibold italic pb-3">No Recent Register
                                                        Animal
                                                    </h1>
                                                    <a href="{{ route('client.animal.register') }}"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 w-40 rounded flex mx-auto">
                                                        <box-icon name='pencil' color='#ffffff'></box-icon><span>Register
                                                            Animal</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($recent as $animal)
                                                <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white' }}">
                                                    <td class="py-4 border-b border-black uppercase font-semibold">
                                                        {{ $animal->type }}
                                                    </td>
                                                    <td class="py-4 border-b border-black">
                                                        {{ $animal->created_at }}
                                                    </td>
                                                    <td class="py-4 font-semibold border-b border-black uppercase"
                                                        style="color: {{ $animal->status === 'pending' ? 'orange' : ($animal->status === 'approved' ? 'green' : ($animal->status === 'rejected' ? 'red' : 'black')) }}">
                                                        {{ $animal->status }}</td>
                                                    <td class="py-4 border-b border-black font-semibold capitalize">
                                                        {{ $animal->destination }}
                                                    </td>
                                                </tr>
                                                @php $index++ @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>

    @endsection
    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
