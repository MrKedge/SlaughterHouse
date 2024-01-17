<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Login'])

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
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6 text-sm lg:text-lg" action="{{ route('login.authenticate') }}"
                        method="POST">
                        @csrf
                        <div>
                            {{-- <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                Email</label> --}}
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>

                                </div>
                                <input type="email" name="email" placeholder="Email"
                                    value="{{ old('email') ?: session('email') }}" required
                                    class="bg-transparent text-sm lg:text-lg placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5"
                                    placeholder="Enter your email">
                            </div>
                        </div>
                        <div>
                            {{-- <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                Password</label> --}}
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>

                                </div>
                                <input type="password" name="password" placeholder="Password" required
                                    class="bg-transparent text-sm lg:text-lg placeholder-gray-500 border-b outline-none border-gray-900 text-gray-900 block w-full pr-6 p-2.5">
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 ">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-gray-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            in</button>
                        <p class="text-sm font-medium text-gray-700 ">
                            Don't have an account? <a href="{{ route('sign.up') }}"
                                class="font-medium text-blue-600 hover:underline">Sign up</a>
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
