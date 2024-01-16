<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'SignUp'])

<body class="overflow-hidden">
    <div class="flex justify-center items-center h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="z-40 absolute top-0 left-0 w-full h-4 text-end font-sans font-semibold text-gray-800"><span><a
                    href="">About
                    us</a></span>
            <span class="px-4"><a href="">Contact</a></span>
        </div>

        @include('alerts.error')
        <section
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-auto lg:py-0 bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
            <h1 class="text-center text-4xl font-bold py-8 ">SIGN UP</h1>
            {{-- <pre class="hidden">{{ var_dump(session()->all()) }}</pre> --}}
            <div class="flex justify-center">
                <form action="{{ route('store.account') }}" method="POST" class="text-lg font-semibold text-center">
                    @csrf
                    <div class="pb-5 relative">
                        <input minlength="3" value="{{ old('firstName') }}" type="text" name="firstName"
                            placeholder="First Name" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500 ">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='user'></box-icon></span>
                    </div>

                    <div class="pb-5 relative">

                        <input minlength="3" type="text" name="lastName" placeholder="Last Name" required
                            value="{{ old('lastName') }}"
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='user'></box-icon></span>
                    </div>
                    {{-- <div class="pb-5 relative">

                        <select name="role" id="role" onchange="toggleAddressField()" required
                            class="bg-transparent outline-none border-black border-b w-[310px] text-red-500 focus:outline-[#293241] focus:ring focus:border-blue-200 focus:border-2">
                            <option value="" disabled selected><span class=" text-gray-500">Select Role</span>
                            </option>
                            <option class="text-black" value="client">Client</option>
                            <option class="text-black" value="admin">Admin</option>
                            <option class="text-black" value="inspector">Inspector</option>
                            <option class="text-black" value="butcher">Butcher</option>
                        </select>

                    </div> --}}
                    <div id="addressDiv" class="pb-5 relative">

                        <input minlength="3" id="addressInput" type="text" name="address" placeholder="Address"
                            required value="{{ old('address') }}"
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon name='bank'
                                type='solid'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input type="email" name="email" placeholder="Email" required
                            value="{{ session('newEmail') }}"
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon name='envelope'
                                type='solid'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input minlength="6" type="password" name="password" placeholder="Password" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='lock'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input minlength="6" type="password" name="password_confirmation"
                            placeholder="Confirm Password" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon name='pencil'
                                type='solid'></box-icon></span>
                    </div>
                    <div class="block text-center p-2 pb-3"><button
                            class="py-1 rounded-md bg-[#293241] text-white w-[300px]" type="submit">SIGN UP
                        </button>
                        <div class="">
                            <h1 class="text-center font-semibold pt-4 pb-8">Already have an account? <a
                                    href="{{ route('log.in') }}" class="text-[#0E7BBB]">Log
                                    in</a>
                            </h1>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    {{-- <script>
        function toggleAddressField() {
            var roleSelect = document.getElementById("role");
            var addressField = document.getElementById("addressDiv");
            var addressInput = document.getElementById("addressInput");

            if (roleSelect.value === "client") {
                addressField.style.display = "block";
                addressInput.required = true;
            } else {
                addressField.style.display = "none";
                addressInput.required = false;
            }
        }

        // Call function on page load to initialize the form state
        toggleAddressField();
    </script> --}}
</body>

</html>

<section class="bg-gray-50 ">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                alt="logo">
            Flowbite
        </a>
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 ">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot
                            password?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        in</button>
                    <p class="text-sm font-light text-gray-500 ">
                        Don’t have an account yet? <a href="#"
                            class="font-medium text-primary-600 hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
