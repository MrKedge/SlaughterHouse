<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'SignUp'])

<body class="">
    <section class="bg-gray-50 bg-no-repeat bg-cover h-screen bg-origin-content bg-center"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            {{-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
        <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
            alt="logo">
        Flowbite
    </a> --}}
            <div
                class="w-full md:mt-0 sm:max-w-md xl:p-0 bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border">
                <div class="p-6 space-y-2 md:space-y-4 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Create Account
                    </h1>
                    <form class="space-y-4 md:space-y-6 text-sm lg:text-base" action="{{ route('store.account') }}"
                        method="POST">
                        @csrf
                        <div>
                            <div class="relative">{{-- f name --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                </div>
                                <input minlength="3" value="{{ old('firstName') }}" type="text" name="firstName"
                                    placeholder="First Name" required
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5"
                                    placeholder="First name">
                            </div>
                        </div>
                        <div>
                            <div class="relative">{{-- l name --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                </div>
                                <input minlength="3" type="text" name="lastName" placeholder="Last Name" required
                                    value="{{ old('lastName') }}"
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5"
                                    placeholder="Last name">
                            </div>
                        </div>
                        <div>
                            <div class="relative">{{-- address --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z" />
                                        <path fill-rule="evenodd"
                                            d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z"
                                            clip-rule="evenodd" />
                                        <path d="M12 7.875a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" />
                                    </svg>



                                </div>
                                <input minlength="3" id="addressInput" type="text" name="address"
                                    placeholder="Address" required value="{{ old('address') }}"
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5">
                            </div>
                        </div>
                        <div>
                            <div class="relative">{{-- email --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path
                                            d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>

                                </div>
                                <input type="email" name="email" placeholder="Email" required
                                    value="{{ session('newEmail') }}"
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5">
                            </div>
                        </div>
                        <div>
                            <div class="relative">{{-- password --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>
                                <input minlength="6" type="password" name="password" placeholder="Password" required
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5">
                            </div>
                        </div>
                        <div>
                            <div class="relative">{{-- C password --}}
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>
                                <input minlength="6" type="password" name="password_confirmation"
                                    placeholder="Confirm Password" required
                                    class="bg-transparent text-sm lg:text-base placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-gray-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            Up
                        </button>
                        <p class="text-sm font-medium text-gray-700 ">
                            Already have an account? <a href="{{ route('log.in') }}"
                                class="font-medium text-blue-600 hover:underline">Log in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('alerts.error')
    @include('alerts.success')
</body>

</html>
