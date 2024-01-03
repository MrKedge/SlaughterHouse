<!DOCTYPE html>
<html lang="en">
@include('layout.html-head', ['pageTitle' => 'Create Account'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}



        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}


        <div class="flex">{{-- middle content wrapper --}}

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


            {{-- table wrapper --}}

            <div class="flex flex-col w-full ml-[240px]">


                <section class="flex justify-evenly gap-3 w-full h-auto px-4">
                    {{-- wrapper --}}
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon name='time'
                                type='solid' color='#293241' style="width: 32px; height: 32px;"></box-icon>
                        </div>

                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='check-double' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                    <div
                        class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                        <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                        <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400"><box-icon
                                name='list-check' type='solid' color='#293241'
                                style="width: 32px; height: 32px;"></box-icon>
                        </div>
                    </div>
                </section>


                <div class="max-w-2xl ml-4 bg-white rounded-md backdrop-blur-0 mt-3 mb-10 pb-10 px-20">
                    <div class="flex justify-center">
                        @include('alerts.error') @include('alerts.success')
                    </div>
                    {{-- <div class="scrollbar-gutter bg-white h-auto w-[1200px] rounded-2xl overflow-y-auto"> --}}
                    <form action="{{ route('admin.seed.account') }}" method="post">
                        @csrf
                        <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">Create Account

                        </h1>
                        <div class="grid gap-6 mb-6 max-w-12 md:grid-cols-2 ">

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
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email
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
                                with the <a href="#"
                                    class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                    conditions</a>.</label>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
            </div>
            {{-- End wrapper --}}
        </div>
    </div>
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
