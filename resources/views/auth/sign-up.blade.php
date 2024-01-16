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
                <form class="max-w-sm mx-auto">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                        Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="email-address-icon"
                            class="bg-transparent border-b border-gray-300 text-gray-900 text-sm rounded-lg  block w-full ps-10 p-2.5"
                            placeholder="name@flowbite.com">
                    </div>
                </form>
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
