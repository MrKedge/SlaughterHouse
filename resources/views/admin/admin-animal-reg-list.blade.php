<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Pending List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')

        <div class="flex flex-col w-full">

            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                {{-- wrapper --}}
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                        </svg><span class="font-bold text-4xl">{{ $animal->where('type', 'cow')->count() }}</span>
                    </div>

                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">HORSE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                        </svg>
                        <span class="text-4xl font-bold">{{ $animal->where('type', 'horse')->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">CARABAO</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                        </svg>
                        <span class="text-4xl font-bold">{{ $animal->where('type', 'carabao')->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">SWINE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                        </svg>

                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>

            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section class="bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg border-white border-2 p-4">

                    <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80">Pending Animal</h1>
                    <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                        <table id="example" class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th data-priority="1" class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        No.
                                    </th>
                                    <th data-priority="2" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Animal
                                    </th>
                                    <th data-priority="3" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th data-priority="4" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Date
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
                                        <td rowspan="6" colspan="6"
                                            class="h-[500px] py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">No Approve
                                                Animal
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
                                                {{ \Carbon\Carbon::parse($animals->created_at)->format('M d Y H:I a') }}
                                            </td>

                                            <td class=" border-b border-black font-semibold capitalize">
                                                <span
                                                    class="bg-yellow-50 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                    {{ $animals->status }}
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
</body>

</html>
