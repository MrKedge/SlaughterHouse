<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'SignUp'])

<body class="overflow-hidden">
    <div class="flex justify-center items-center h-screen">
        <div class="z-40 absolute top-0 left-0 w-full h-4 text-end font-sans font-semibold text-gray-800"><span><a
                    href="">About
                    us</a></span>
            <span class="px-4"><a href="">Contact</a></span>
        </div>
        <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image">
        <section
            class="z-10 w-[400px] h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
            <h1 class="text-center text-4xl font-bold py-8 ">SIGN UP</h1>
            <div class="flex justify-center">
                <form action="{{ route('store.account') }}" method="POST" class="text-lg font-semibold text-center">
                    @csrf
                    <div class="pb-5 relative">

                        <input type="text" name="firstName" placeholder="First Name" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500 ">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='user'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input type="text" name="lastName" placeholder="Last Name" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='user'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <select name="role" id="role" onchange="toggleAddressField()" required
                            class="bg-transparent outline-none border-black border-b w-[310px] text-red-500 focus:outline-[#293241] focus:ring focus:border-blue-200 focus:border-2">
                            <option value="" disabled selected><span class=" text-gray-500">Select Role</span>
                            </option>
                            <option class="text-black" value="client">Client</option>
                            <option class="text-black" value="admin">Admin</option>
                            <option class="text-black" value="inspector">Inspector</option>
                            <option class="text-black" value="butcher">Butcher</option>
                        </select>

                    </div>
                    <div id="addressDiv" style="display: none;" class="pb-5 relative">

                        <input id="addressInput" type="text" name="address" placeholder="Address"
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon name='bank'
                                type='solid'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input type="email" name="email" placeholder="Email" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon name='envelope'
                                type='solid'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input type="password" name="password" placeholder="Password" required
                            class="bg-transparent outline-none border-black border-b w-[310px] placeholder-gray-500">
                        <span class="absolute inset-y-0 right-1 pl-3 flex items-between"><box-icon type='solid'
                                name='lock'></box-icon></span>
                    </div>
                    <div class="pb-5 relative">

                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required
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
    <script>
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

        // Call the function on page load to initialize the form state
        toggleAddressField();
    </script>
</body>

</html>
