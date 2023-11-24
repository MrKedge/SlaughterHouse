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

            <div class="w-full px-6">
                <section
                    class="scrollbar-gutter ml-[240px] bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">


                    <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">Scheduling
                        Queue
                    </h1>


                    <table class="w-full text-center">
                        <thead class="">
                            <tr>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                    Owner
                                </th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                </th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                    Status
                                </th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                    Approved Time
                                </th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                    Time of Arrival
                                </th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                    Time of Slaughter
                                </th>
                            </tr>
                        </thead>
                        <tbody class="">


                            @php $index = 1 @endphp
                            @foreach ($animal as $animals)
                                <tr
                                    class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                    <td class="py-4 border-b border-black uppercase font-semibold">
                                        {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                    </td>
                                    <td class="py-4 border-b border-black uppercase font-semibold">
                                        {{ $animals->type }}
                                    </td>
                                    <td class="py-4 font-semibold border-b border-black uppercase"
                                        style="color: {{ $animals->status === 'pending' ? 'orange' : ($animals->status === 'approved' ? 'green' : ($animals->status === 'rejected' ? 'red' : 'black')) }}">
                                        {{ $animals->status }}</td>
                                    <td class="py-4 border-b border-black font-semibold capitalize">
                                        {{ $animals->approved_at }}
                                    </td>

                                </tr>
                                @php $index++ @endphp
                            @endforeach

                        </tbody>
                    </table>


                </section>
            </div>




        </div>{{-- End wrapper --}}





        <script src="{{ asset('js/slaughterhouse.js') }}"></script>

</body>

</html>
