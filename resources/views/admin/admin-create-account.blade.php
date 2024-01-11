<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Create Account'])

<body class="bg-white">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <section class="bg-white m-10  sm:m-0">
            <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 ">Create Account</h2>
                <form action="{{ route('admin.seed.account') }}" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                        <div class="w-full">{{-- sm:col-span-2 --}}
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                First Name</label>
                            <input type="text" id="first_name" name="firstName" value="{{ old('firstName') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Input Name" required>
                        </div>
                        <div class="w-full">
                            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                            <input type="text" id="last_name" name="lastName" value="{{ old('lastName') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Input Lastname" required>
                        </div>

                        <div class="w-full">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                value="@gmail.com"&ldquo; placeholder="Input Email" required>
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                            <select id="role" name="role" required value="{{ old('role') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option disabled selected>Role</option>
                                <option value="admin">Admin</option>
                                <option value="inspector">Inspector</option>
                                <option value="butcher">Butcher</option>
                                <option value="client">Client</option>
                            </select>
                        </div>
                        <div id="addressDiv" class="w-full hidden">
                            <label for="brand" class=" block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <input type="text" name="address" id="address-field" value="{{ old('address') }}"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Input Address" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input minlength="6" type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="•••••••••" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                                Password</label>
                            <input minlength="6" type="password" name="password_confirmation" id="confirm_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="•••••••••" required>
                        </div>
                        {{-- <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 "
                            placeholder="Write a product description here...">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                    </div> --}}
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    @endsection
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function toggleAddressField() {
                var roleSelect = document.getElementById("role");
                var addressField = document.getElementById("addressDiv");
                var addressInput = document.getElementById("address-field");

                if (roleSelect.value === "client") {
                    addressField.classList.remove("hidden");
                    addressInput.required = true;
                } else {
                    addressField.classList.add("hidden");
                    addressInput.required = false;
                }
            }

            // Call function on page load to initialize the form state
            toggleAddressField();

            // Add an event listener to the role select element
            document.getElementById("role").addEventListener("change", toggleAddressField);
        });
    </script>
</body>

</html>


{{-- <div class="flex flex-col w-full ml-[240px] pt-10">


    <div class="max-w-2xl ml-2 bg-white rounded-md backdrop-blur-0 mt-3 mb-10 pb-10 px-20">
        <div class="flex justify-center">
        </div>
        {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto">
        <form action="{{ route('admin.seed.account') }}" method="post">
            @csrf
            <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">Create Account

            </h1>
            <div class="grid gap-6 mb-6 w-full md:grid-cols-2 ">

                <div>
                    <label for="first_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">First
                        name</label>
                    <input type="text" id="first_name" name="firstName"
                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="first name" required>
                </div>
                <div>
                    <label for="last_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Last
                        name</label>
                    <input type="text" id="last_name" name="lastName"
                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="last name" required>
                </div>
                <div>

                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select a Role
                    </label>
                    <select id="role" name="role" required
                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Choose a Role</option>
                        <option value="admin">Admin</option>
                        <option value="inspector">Inspector</option>
                        <option value="butcher">Butcher</option>
                        <option value="client">Client</option>
                    </select>

                </div>
                <div id="addressDiv" class="hidden">
                    <label for="address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Address</label>
                    <input type="text" id="address-field" name="address"
                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email
                    address</label>
                <input id="email" type="email" name="email" placeholder="Email" required
                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john.doe@company.com" required>
            </div>
            <div class="mb-6">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Password</label>
                <input minlength="6" type="password" name="password" id="password"
                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="•••••••••" required>
            </div>
            <div class="mb-6">
                <label for="confirm_password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Confirm
                    password</label>
                <input minlength="6" type="password" name="password_confirmation" id="confirm_password"
                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="•••••••••" required>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border-2 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-transparent dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required>
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 ">I
                    agree
                    with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a>.</label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</div> --}}
