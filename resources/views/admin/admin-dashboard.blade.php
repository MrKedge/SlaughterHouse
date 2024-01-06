<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Approved List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')


        <div class="flex flex-col w-full">{{-- Inside wrapper --}}


            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                {{-- wrapper --}}
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                            type='solid' color='#293241'
                            style="width: 32px; height: 32px;"></box-icon>{{ $animal->where('status', 'pending')->count() }}
                    </div>

                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='check-double'
                            type='solid' color='#293241'
                            style="width: 32px; height: 32px;"></box-icon>{{ $animal->count() }}
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241'
                            style="width: 32px; height: 32px;"></box-icon>{{ $user->where('role', 'client')->count() }}
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='list-check'
                            type='solid' color='#293241'
                            style="width: 32px; height: 32px;"></box-icon>{{ $animal->where('status', 'approved')->count() }}
                    </div>
                </div>
            </section>


            <section class="h-full gap-3 pt-0 w-full  px-4">

                {{-- table wrapper --}}
                <section class=" flex justify-center">
                    <div class="scrollbar-gutter bg-white h-auto w-full rounded-2xl overflow-y-auto ">
                        <h1 class="text-center font-extrabold text-[#293241] pb-2 pt-4 text-3xl">RECENT
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

            </section>


            {{-- <div class="flex gap-3 m-4 justify-between items-center">
    
            <div class="w-[400px] h-[400px] bg-white">
    
            </div>
    
    
            <div class="w-[400px] h-[400px] bg-white">
    
            </div>
    
        </div> --}}





        </div>
    @endsection
</body>

</html>
