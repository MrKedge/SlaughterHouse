<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Login'])

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
            @if (session('success'))
                <div id="success-alert" class="alert alert-success text-sm text-green-800 font-medium text-center">
                    {{ session('success') }}
                </div>

                <script>
                    // Automatically hide the success alert after 3 seconds
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 3000);
                </script>
            @endif
            <h1 class="text-center text-4xl font-bold pb-8 pt-4 ">LOG IN</h1>
            <div class="flex justify-center">
                <form action="{{ route('login.authenticate') }}" method="POST"
                    class="text-lg font-semibold text-center">
                    @csrf
                    <div class="pb-5 relative">

                        <input type="email" name="email" placeholder="Email"
                            value="{{ old('email') ?: session('email') }}" required
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

                    <div class="block text-center p-2 pb-3"><button
                            class="py-1 rounded-md bg-[#293241] text-white w-[300px]" type="submit">LOG IN
                        </button>
                        <div class="py-4">
                            <h1 class="text-center font-semibold">Don't have an account?
                            </h1>
                            <h1 class="text-center font-semibold"><a href="{{ route('sign.up') }}"
                                    class="text-[#0E7BBB]">Create
                                    an account? </a>
                            </h1>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

</body>

</html>
