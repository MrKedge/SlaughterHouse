<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>Animal Schedule List</title>
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
                    class=" ml-[240px] bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                    <div class="flex">
                        <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">Schedule
                        </h1>
                        <div class="">
                            <label for=""></label>
                            {{-- <input type="checkbox"> --}}
                        </div>
                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[500px]">
                        <table class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Time of Arrival
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Time of Slaughter
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Permit To Slaughter
                                    </th>
                                    <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @if ($animal->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">No Scheduled Animal
                                                Animal
                                            </h1>
                                        </td>
                                    </tr>
                                @else
                                    @php $index = 1 @endphp
                                    @foreach ($animal as $animals)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                            <td class="py-4 border-b border-black capitalize font-semibold">
                                                {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                            </td>
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $animals->type }}
                                            </td>
                                            <td class="py-4 border-b border-black font-semibold capitalize">
                                                {{ $animals->arrived_at }}
                                            </td>
                                            <td class="py-4 border-b border-black font-semibold capitalize">
                                                {{ $animals->scheduled_at }}
                                            </td>
                                            <td class="py-4 border-b border-black font-semibold capitalize">
                                                <img src="" alt="permit image">
                                            </td>
                                            <td class="border-b border-black font-semibold capitalize">
                                                <div class="flex justify-center gap-3">
                                                    <form
                                                        action="{{ route('generate.qr.code', ['id' => $animals->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btnForSchedNav bg-[#293241] hover:bg-gray-800 text-white font-bold py-1 px-1 rounded flex items-center">
                                                            <i class='bx bx-qr'
                                                                style='color: #ffffff; font-size: 28px;'></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded flex items-center">
                                                        <box-icon name='navigation'
                                                            color='#ffffff'></box-icon><span>View</span>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                        @php $index++ @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>




            {{-- End wrapper --}}
        </div>




        <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
