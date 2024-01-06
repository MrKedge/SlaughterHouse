<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'SSHPDP'])

<body class="bg-[#D5DFE8]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        {{-- wrapper --}}



        {{-- HEADER --}}

        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}



            {{-- table wrapper --}}
            <div class="flex flex-col w-full">


                {{-- <section class="flex justify-evenly gap-3 pb-3 w-full h-auto px-4">
                 
               
                </section> --}}


                <div class="mx-auto mt-6 w-full px-4">

                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <section class=" bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg  border border-white p-4">

                        <div class="flex justify-between ">

                            <div class="text-gray-600"> @include('admin.tabs.tabs')</div>
                            @include('admin.tabs.search-bar')

                        </div>

                    </section>

                    <div class="flex text-start items-center mt-4 gap-4">
                        <h1 class=" text-gray-600 font-medium text-2xl rounded-lg px-5 ">
                            SSHPDP</h1>



                    </div>

                </div>
            </div>
            {{-- End wrapper --}}
        </div>



        <div class="px-4 pt-4">
            <div class=" shadow-md sm:rounded-lg flex justify-center">


                <div
                    class="overflow-x-auto overflow-y-auto w-full h-[500px] sm:rounded-lg rounded-b-xl border border-white">


                    <div class="grid  mb-4 grid-cols-2 gap-4">
                        @foreach ($animalType as $type)
                            @if (!is_null($type) && $type !== '')
                                <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow text-gray-700 ">
                                    <a href="{{ route('animal.sshpdp', ['animalType' => $type]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                            <path
                                                d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                            <path
                                                d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                                        </svg>


                                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-700 capitalize ">
                                            {{ e($type) }}</h5>

                                        <p class="mb-3 font-normal text-gray-500 ">Survey of Slaughterhouses and poultry
                                            dressing plants of {{ $type }}
                                        </p>
                                        <div class="inline-flex items-center text-blue-600 hover:underline">

                                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>


                </div>
            </div>

        </div>
    @endsection

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
