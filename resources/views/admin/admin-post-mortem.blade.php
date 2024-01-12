<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Post mortem List'])

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
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>


                        <span class="font-bold text-4xl">{{ $animal->where('type', 'cow')->count() }}</span>
                    </div>

                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">HORSE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
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
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
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
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>



                        <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                    </div>
                </div>
            </section>


            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}

                <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg border-white border-2 p-4">
                    <h1 class="text-2xl font-bold py-3 text-[#293241] opacity-80">Scheduled Animal</h1>
                    <div class="relative overflow-x-auto shadow-md ">
                        <table class="w-full text-sm text-center capitalize font-medium text-gray-500 ">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">

                                <div class="mt-1 flex items-center justify-between text-sm font-normal text-gray-500 ">
                                    @include('admin.tabs.tabs')
                                    @include('admin.tabs.search-bar')
                                </div>
                            </caption>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300 ">

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
                                        Carcass Weight
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
                                        Action
                                    </th>
                                </tr>
                            </thead>


                            @forelse ($animal as $animals)
                                <tbody>
                                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} border-b hover:bg-gray-100">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <p data-popover-target="popover-{{ $loop->index }}"
                                                class="font-medium rounded-lg text-sm py-2.5 text-center">
                                                {{ $animals->type }}
                                            </p>

                                            <!-- Popover -->
                                            <div data-popover id="popover-{{ $loop->index }}" role="tooltip"
                                                class="absolute border border-gray-400 z-50 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-2xl opacity-0">
                                                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
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
                                        <td class="px-6 py-4">
                                            {{ $animals->user->first_name }} {{ $animals->user->last_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $animals->postMortem->post_weight }} kg
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($animals->postMortem->slaughtered_at)->format('M d Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($animals->postMortem->slaughtered_at)->format('h:i a') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animals->postMortem->postmortem_status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center gap-3">
                                                <form action="{{ route('complete.process', ['id' => $animals->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="  text-gray-900 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>

                                                        <span></span>
                                                    </button>
                                                </form>

                                                <a href="{{ route('admin.view.animal.reg.form', ['id' => $animals->id]) }}"
                                                    class="  text-gray-600 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>


                                                    <span></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-4  bg-white text-center">
                                        <h1 class="font-semibold italic pb-3">No
                                            Animal</h1>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>

                </section>
            </div>
        </div>
    @endsection

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
    <script>
        function printPage() {
            // Add opacity-0 class to hide other buttons
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.add('opacity-0');
            });

            // Toggle opacity and apply backdrop styles to the elements with class 'hide-on-print' before printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.add('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Trigger the print function
            window.print();

            // Remove the applied styles and show other buttons after printing
            document.querySelectorAll('.hide-on-print').forEach(function(element) {
                element.classList.remove('fixed', 'inset-0', 'backdrop-blur-sm', 'bg-gray-500', 'bg-opacity-75',
                    'transition-opacity');
            });

            // Remove opacity-0 class to show other buttons after printing
            document.querySelectorAll('.hide-on-print-button').forEach(function(button) {
                button.classList.remove('opacity-0');
            });
        }
    </script>
</body>

</html>
