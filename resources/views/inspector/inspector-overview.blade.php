<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Overview'])

<body class="bg-[#f6f8fa]">

    @extends('layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full ">
            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                {{-- wrapper --}}
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">
                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">COW</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>


                        <span class="font-bold text-4xl">{{ $animal->where('type', 'cow')->count() }}</span>
                    </div>

                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">HORSE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'horse')->count() }}</span>
                    </div>
                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">
                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">CARABAO</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'carabao')->count() }}</span>
                    </div>
                </div>
                <div
                    class="max-h-fit bg-white w-full rounded-r-md shadow-xl border-l-[16px] border-[#37B5B6] rounded-l-md   ">

                    <h1 class="pl-2 text-start flex items-center text-gray-600 font-bold text-lg">SWINE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>


                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>


            <div class="mx-auto w-full px-4 h-screen">



                <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80">

                </h1>
                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                    <table class="w-full whitespace-nowrap text-sm text-center capitalize font-medium text-gray-500 ">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            Recent Slaughter <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
                        </caption>
                        <thead class="text-xs text-white uppercase bg-[#37B5B6] ">

                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Owner
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slaughtered Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slaughtered Time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Butcher
                                </th>

                            </tr>
                        </thead>


                        @forelse ($animal as $animals)
                            <tbody>
                                <tr
                                    class="{{ $loop->even ? 'bg-white' : 'bg-white' }} border-b cursor-pointer border-gray-300 hover:bg-gray-100">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        @include('admin.layout.animals-popover')
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animals->postMortem->slaughtered_at)->format('M d Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animals->postMortem->slaughtered_at)->format('h:i a') }}
                                    </td>
                                    <td class="px-6 py-4">

                                        {{ $animals->status }}

                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $animals->butcher }}
                                    </td>

                                </tr>

                            </tbody>
                        @empty
                            <tr>
                                <td colspan="8" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No Animal</h1>
                                </td>
                            </tr>
                        @endforelse

                    </table>

                </div>

            </div>
        </div>
    @endsection
</body>

</html>
