<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Drafts'])

<body class="bg-[#f6f8fa]">


    @extends('client.layout.masterlayout')

    @section('content')
        {{-- main content --}}
        <div class="flex flex-col w-full gap-3">


            <section class="flex justify-start gap-3 pl-6  py-3 w-full border-l h-auto">
                {{-- wrapper --}}
                <div class="">
                    <a href="{{ route('client.animal.register') }}">
                        <div class="flex items-center text-white"><box-icon name='file-plus' type='solid' color='#293241'
                                size='64px'></box-icon><span class="text-[#293241]">
                            </span></div>
                    </a>
                </div>

            </section>

            <div class="mx-auto w-full px-4">
                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                    <table class="w-full text-center text-base capitalize font-medium text-gray-500 ">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            Drafts Register
                            <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
                        </caption>
                        <thead class="text-xs text-white uppercase bg-slate-600 ">

                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>


                        @forelse ($animal as $animals)
                            <div id="publish-modal{{ $animals->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="publish-modal{{ $animals->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 "
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>

                                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you
                                                sure you want to
                                                publish this?</h3>
                                            <form action="{{ route('publish.animal', ['id' => $animals->id]) }}"
                                                method="POST">
                                                @csrf

                                                <button data-modal-hide="publish-modal{{ $animals->id }}" type="submit"
                                                    class="text-white bg-slate-600 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                    Yes, I'm sure
                                                </button>
                                            </form>
                                            <button data-modal-hide="publish-modal{{ $animals->id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tbody>
                                <tr
                                    class="{{ $loop->even ? 'bg-white' : 'bg-white' }} border-b cursor-pointer border-gray-300 hover:bg-gray-100">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $animals->type }}

                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                            {{ $animals->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $animals->created_at->format('M d Y ') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $animals->created_at->format('h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-center gap-2 items-center text-center">
                                        <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                            class="text-gray-600 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2">
                                            <span>View</span>
                                        </a>

                                        <button data-modal-target="publish-modal{{ $animals->id }}"
                                            data-modal-toggle="publish-modal{{ $animals->id }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2">Publish</button>
                                    </td>
                                </tr>

                            </tbody>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No Drafts Animal</h1>
                                </td>
                            </tr>
                        @endforelse

                    </table>
                    <div class="flex p-4 bg-slate-200">
                        <!-- Previous Button -->
                        <a href="{{ $animal->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </a>
                        <a href="{{ $animal->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            Next
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
