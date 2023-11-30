<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Login'])

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
            <h1 class="text-center text-4xl font-bold py-8 ">LOG IN</h1>
            <div class="flex justify-center">
                <form action="{{ route('login.authenticate') }}" method="POST"
                    class="text-lg font-semibold text-center">
                    @csrf
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

                    <div class="block text-center p-2 pb-3"><button class=" bg-[#293241] text-white w-[300px]"
                            type="submit">LOG IN
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
