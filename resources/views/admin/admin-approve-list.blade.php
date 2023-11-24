<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>Animal Approve List</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}
            <section class="ml-[240px] w-full">
                <div class="scrollbar-gutter bg-white h-auto rounded-2xl overflow-y-auto mx-6">
                    <h1 class="text-left pl-6 font-extrabold text-[#293241] pb-2 pt-4 text-3xl">On Process
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


                                    <tr>
                                        <td colspan="5" class="py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">No Recent Register
                                                Animal
                                            </h1>
                                        </td>
                                    </tr>

                                    @foreach ($animal as $animals)
                                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white' }}">
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animals->type }}
                                            </td>
                                            <td class="py-4 border-b border-black">
                                                {{ $animals->created_at }}
                                            </td>
                                            <td class="py-4 font-semibold border-b border-black uppercase"
                                                style="color: {{ $animals->status === 'pending' ? 'orange' : ($animals->status === 'approved' ? 'green' : ($animals->status === 'rejected' ? 'red' : 'black')) }}">
                                                {{ $animals->status }}</td>
                                            <td class="py-4 border-b border-black font-semibold capitalize">
                                                {{ $animals->destination }}
                                            </td>

                                        </tr>
                                        @php $index++ @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>



        </div>{{-- End wrapper --}}





        <script src="{{ asset('js/slaughterhouse.js') }}"></script>

</body>

</html>
