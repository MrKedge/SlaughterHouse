<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Archived List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')

        <div class="flex flex-col w-full mt-20">





            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg border-white border-2 p-4">

                    <div class="flex justify-between ">

                        <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">
                            Archived
                        </h1>
                        @include('admin.tabs.search-bar')
                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                        <table id="example" class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th data-priority="1" class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Id
                                    </th>
                                    <th data-priority="2" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th data-priority="3" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Animal
                                    </th>
                                    <th data-priority="4" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Archive Date
                                    </th>
                                    <th data-priority="5" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Archived Time
                                    </th>
                                    <th data-priority="6" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Status
                                    </th>
                                    <th data-priority="7" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @if ($animal->isEmpty())
                                    <tr>
                                        <td rowspan="7" colspan="7"
                                            class="h-[500px] py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">
                                                No archive Animal
                                            </h1>
                                        </td>
                                    </tr>
                                @else
                                    @php $index = 1 @endphp
                                    @foreach ($animal as $animals)
                                        <tr
                                            class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black hover:bg-blue-200  ">
                                            <td class=" border-b border-black capitalize font-medium">
                                                {{ $animals->id }}
                                            </td>
                                            <td class="border-b border-black capitalize font-normal">
                                                {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                            </td>
                                            <td class=" border-b border-black uppercase font-semibold relative">
                                                <p data-popover-target="popover-{{ $loop->index }}"
                                                    class="font-medium rounded-lg text-sm py-2.5 text-center">
                                                    {{ $animals->type }}
                                                </p>

                                                <!-- Popover -->
                                                <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-2xl opacity-0">
                                                    <div
                                                        class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                                        <h3 class="font-semibold text-gray-900">{{ $animals->type }}
                                                        </h3>
                                                    </div>
                                                    <div class="z-40 px-3 py-2">
                                                        <p>{{ $animals->gender }}</p>
                                                        <p>{{ $animals->live_weight }} Kg.</p>
                                                        <p>{{ $animals->age }} Mos.</p>
                                                    </div>
                                                    <div data-popper-arrow></div>
                                                </div>
                                            </td>
                                            <td class=" border-b border-black capitalize font-normal">
                                                {{ \Carbon\Carbon::parse($animals->archive->created_at)->format('M d Y') }}
                                            </td>
                                            <td class=" font-normal  border-b border-black capitalize ">
                                                {{ \Carbon\Carbon::parse($animals->archive->created_at)->format('h:i A') }}
                                            </td>
                                            <td class=" border-b border-black font-semibold capitalize">
                                                <span
                                                    class="bg-orange-100 text-orange-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                    {{ $animals->archive->archive_status }}
                                                </span>

                                            </td>
                                            <td class="border-b border-black font-semibold capitalize py-4">
                                                <div class="flex justify-center gap-3">

                                                    <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                        class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" data-slot="icon" class="w-6 h-6">
                                                            <path
                                                                d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                        </svg>

                                                        <span></span>
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
        </div>


    @endsection

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>

</body>

</html>
