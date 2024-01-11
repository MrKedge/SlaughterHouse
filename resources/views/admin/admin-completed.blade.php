<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Completed List'])

<body class="bg-[#D5DFE8] ">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')

        <div class="flex flex-col w-full mt-20">


            {{-- <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                
            <div
                class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">COW</h1>

                <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                    <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
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
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
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
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
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
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>



                    <span class="text-4xl font-bold">{{ $animal->where('type', 'swine')->count() }}</span>
                </div>
            </div>
            </section> --}}


            <div class="mx-auto w-full px-4">

                {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg border-white border-2 p-4">

                    <div class="flex justify-between ">

                        <h1 class="text-left pl-6 font-bold text-[#293241] py-4 text-3xl opacity-80">Completed
                        </h1>
                    </div>
                    <div class="scrollbar-gutter overflow-y-auto h-[430px]">
                        <table id="example" class="w-full text-center">
                            <thead class="">
                                <tr>
                                    <th data-priority="1" class="z-30 sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        No.
                                    </th>
                                    <th data-priority="2" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Owner
                                    </th>
                                    <th data-priority="3" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Address
                                    </th>
                                    <th data-priority="5" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Animal
                                    </th>
                                    <th data-priority="7" class="z-30  sticky text-white bg-[#293241] top-0 p-2 border-r-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">

                                @if ($owner->isEmpty())
                                    <tr>
                                        <td rowspan="6" colspan="6"
                                            class="h-[500px] py-4 border-b border-black text-center">
                                            <h1 class="font-semibold italic pb-3">Empty Table

                                            </h1>
                                        </td>
                                    </tr>
                                @else
                                    @php $index = 1 @endphp
                                    @foreach ($owner as $owners)
                                        <tr
                                            class="{{ $loop->even ? 'bg-gray-300' : 'bg-white bg-opacity-20' }} border border-black">
                                            <td class="py-4 border-b border-black uppercase font-semibold">
                                                {{ $loop->iteration }}
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
                                                    <a href="{{ route('owner.mic.list', ['ownerId' => $owners->id]) }}"
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
