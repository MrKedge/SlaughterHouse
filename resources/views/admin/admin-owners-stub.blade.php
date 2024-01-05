<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Owner List'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="flex flex-col w-full ml-[240px]">


                <section class="flex justify-evenly gap-3 pb-3 w-full h-auto px-4">
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

                        <div class="flex items-center gap-6">
                            <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">Issuing of stab
                            </h1>

                            {{-- <form action="" method="get">
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                <select id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-gray-500 dark:focus:border-gray-900">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="slaughter">For Slaughter</option>
                                </select>
                            </form> --}}
                            <div class="">
                                <label for=""></label>
                                {{-- <input type="checkbox"> --}}
                            </div>
                        </div>
                        <div class="scrollbar-gutter overflow-y-auto h-[420px]">
                            <table class="w-full text-center">
                                <thead class="">
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Id
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Owner
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Address
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Animals
                                        </th>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">

                                    @if ($owner->isEmpty())
                                        <tr>
                                            <td colspan="7" class="py-4 border-b border-black text-center h-[500px]">
                                                <h1 class="font-semibold italic pb-3">No Owners With Animal
                                                </h1>
                                            </td>
                                        </tr>
                                    @else
                                        @php $index = 1 @endphp
                                        @foreach ($owner as $owners)
                                            <tr
                                                class="{{ $loop->even ? 'bg-gray-300' : 'bg-white bg-opacity-20' }} border border-black">
                                                <td class="py-4 border-b border-black uppercase font-semibold">
                                                    {{ $owners->id }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $owners->last_name }}, {{ $owners->first_name }}
                                                </td>
                                                <td class="py-4 border-b border-black capitalize font-semibold">
                                                    {{ $owners->address }}
                                                </td>
                                                <td class="py-4 border-b border-black font-semibold capitalize">
                                                    {{ $owners->animals->count() }}
                                                </td>
                                                <td class="border-b border-black font-semibold capitalize">
                                                    <div class="flex justify-center gap-3">
                                                        <a href="{{ route('admin.for.stub.animals', ['ownerId' => $owners->id]) }}"
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
