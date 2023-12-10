<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Verify Email'])

<body class="overflow-hidden">
    <div class="flex justify-center items-center h-screen">
        <img class="z-1 absolute h-screen w-screen" src="{{ asset('images/background.png') }}" alt="image">
        <section
            class="z-10 w-[400px] h-auto bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
            <h1 class="text-center text-4xl font-bold py-8 ">Verify Email</h1>
            <div class="flex justify-center">
                <form action="{{ route('verify.account') }}" method="post" class="max-w-sm mx-auto text-center">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <div class="mb-2 space-x-2 rtl:space-x-reverse justify-center">
                        <div class="px-6">
                            <label for="verification-code" class="sr-only">Verification Code</label>
                            <input type="text" maxlength="6" id="verification-code" name="verification-code"
                                class="w-full block h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                    </div>
                    @if (session('error'))
                        <div id="error-alert" class="alert alert-danger text-sm text-red-800 font-medium">
                            {{ session('error') }}
                        </div>

                        <script>
                            // Automatically hide the error alert after 3 seconds
                            setTimeout(function() {
                                document.getElementById('error-alert').style.display = 'none';
                            }, 3000);
                        </script>
                    @endif

                    <p class="mt-2 text-sm text-gray-700 font-medium">
                        Please enter the 6-digit code sent to {{ session('email') }}.
                    </p>

                    <button type="submit"
                        class="py-1 px-10 rounded-md bg-[#293241] text-white m-4 font-medium">SEND</button>
                </form>

            </div>
            <form id="resend-form" action="{{ route('resend.code') }}" method="POST">
                @csrf
                <input type="hidden" name="resend-code-mail" value="{{ session('email') }}">
                <button type="submit" id="resend-link" class="text-[#0E7BBB]">Resend a
                    code</button>
            </form>
    </div>
</body>

</html>
