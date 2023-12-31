<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Dispose List'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="flex flex-col w-full ml-[240px]">


                <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4">
                    {{-- wrapper --}}
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        </div>

                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                </section>


                <div class="mx-auto w-full px-4">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section
                        class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">

                        <div class="flex">
                            <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">Disposed
                                Animal
                            </h1>
                            <div class="">
                                <label for=""></label>
                                {{-- <input type="checkbox"> --}}
                            </div>
                        </div>
                        <div class="scrollbar-gutter overflow-y-auto h-[440px]">
                            <table class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Id
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Animal
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Status
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Cause
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Date of Disposal
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Weight
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @if ($animal->isEmpty())
                                        <tr>
                                            <td colspan="8" class="py-4 border-b border-black text-center h-[500px]">
                                                <h1 class="font-semibold italic pb-3">No Disposed Animal
                                                </h1>
                                            </td>
                                        </tr>
                                    @else
                                        @php $index = 1 @endphp
                                        @foreach ($animal as $animals)
                                            <tr
                                                class="{{ $index % 2 === 0 ? 'bg-gray-300 ' : 'bg-white bg-opacity-20' }} border border-black">
                                                <td class=" border-b border-black uppercase font-semibold">
                                                    {{ $animals->id }}
                                                </td>
                                                <td class=" border-b border-black capitalize font-semibold">
                                                    {{ $animals->type }}
                                                </td>
                                                <td class=" border-b border-black uppercase font-semibold">
                                                    {{ optional($animals->anteMortem)->inspection_status }}
                                                </td>
                                                <td class="border-b border-black capitalize font-semibold">

                                                    <p data-popover-target="popover-{{ $loop->index }}"
                                                        class="font-bold rounded-lg text-sm px-5 py-2.5 text-center">
                                                        {{ Str::limit(optional($animals->anteMortem)->causes, 10, '...') }}
                                                    </p>
                                                    <!-- Popover -->
                                                    <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 ">
                                                        <div
                                                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg  ">
                                                            <h3 class="font-semibold text-gray-900 ">
                                                                {{ $animals->type }}</h3>
                                                        </div>
                                                        <div class="z-40 px-3 py-2">

                                                            <div>
                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Cause:</label>
                                                                <p id="address"
                                                                    class="font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    {{ optional($animals->anteMortem)->causes }}

                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900 pt-3">Remarks:</label>
                                                                <textarea readonly
                                                                    class="cursor-not-allowed  font-medium capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    rows="3" {{-- You can adjust the number of rows based on your design --}} name="ante_remarks">{{ optional($animals->anteMortem)->ante_remarks }}</textarea>
                                                            </div>

                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                                <td class=" border-b border-black font-semibold capitalize">
                                                    {{ optional($animals->anteMortem)->inspected_at }}
                                                </td>
                                                <td class=" border-b border-black font-semibold capitalize">
                                                    {{ $animals->live_weight }} Kg.
                                                </td>
                                                <td class="border-b border-black font-semibold capitalize">
                                                    {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                                </td>
                                                <td class="border-b border-black font-semibold capitalize py-4">
                                                    <div class="flex justify-center gap-3">

                                                        {{-- <form
                                                            action="{{ route('for.slaughter.animal', ['id' => $animals->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btnForSchedNav bg-[#293241] hover:bg-gray-800 text-white font-bold py-1 px-2 rounded flex items-center">
                                                                Dispatch
                                                            </button>
                                                        </form> --}}

                                                        <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                            class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" data-slot="icon" class="w-6 h-6">
                                                                <path
                                                                    d="M6 3a3 3 0 0 0-3 3v1.5a.75.75 0 0 0 1.5 0V6A1.5 1.5 0 0 1 6 4.5h1.5a.75.75 0 0 0 0-1.5H6ZM16.5 3a.75.75 0 0 0 0 1.5H18A1.5 1.5 0 0 1 19.5 6v1.5a.75.75 0 0 0 1.5 0V6a3 3 0 0 0-3-3h-1.5ZM12 8.25a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM4.5 16.5a.75.75 0 0 0-1.5 0V18a3 3 0 0 0 3 3h1.5a.75.75 0 0 0 0-1.5H6A1.5 1.5 0 0 1 4.5 18v-1.5ZM21 16.5a.75.75 0 0 0-1.5 0V18a1.5 1.5 0 0 1-1.5 1.5h-1.5a.75.75 0 0 0 0 1.5H18a3 3 0 0 0 3-3v-1.5Z" />
                                                            </svg>

                                                            <span>View</span>
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




            {{-- End wrapper --}}
        </div>




        <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
