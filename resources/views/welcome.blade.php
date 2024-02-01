<!DOCTYPE html>
<html lang="en">
@include('layout.html-head', ['pageTitle' => 'Welcome'])

<body class="">



    <section
        class="bg-center bg-cover w-screen h-screen bg-no-repeat bg-[url('/public/images/background.png')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">

            <header class="absolute  inset-x-0 top-0 z-50 ">
                <nav class="flex items-center justify-end w-full p-6 lg:px-8" aria-label="Global">
                    <div class=" lg:flex lg:flex-1 justify-end">
                        <a href="{{ route('log.in') }}" class="text-sm font-semibold leading-6 text-white">Log in <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </nav>
                <!-- Mobile menu, show/hide based on menu open state. -->

            </header>


            <div class="">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-300 ring-1 ring-gray-800/10 hover:ring-gray-400/20">
                        Announcing our new system Slaughtech <a href="#" class="font-semibold text-blue-600"><span
                                class="absolute inset-0" aria-hidden="true"></span>About us <span
                                aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <div class="text-center">
                    <h1
                        class="font-raleway mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                        Welcome to <span class="text-[#EE6C4D] ">SLAUGH</span>TECH</h1>
                    <p class="font-exo2 mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at
                        Slaughtech, we focus on quality meat processing with a strong emphasis on sanitation.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                            <a href="{{ route('sign.up') }}"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Sign Up
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- --}}

        </div>
    </section>



</body>

</html>
