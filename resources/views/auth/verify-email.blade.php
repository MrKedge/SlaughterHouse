<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Verify Email'])

<body class="overflow-hidden">
    <section class="bg-gray-50 bg-no-repeat bg-cover h-screen bg-origin-content bg-center"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div
                class="w-full md:mt-0 sm:max-w-md xl:p-0 bg-white rounded-2xl shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border">
                <div class="p-6 space-y-2 md:space-y-4 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Verify Email
                    </h1>
                    <form action="{{ route('verify.account') }}" method="post" class="max-w-sm mx-auto text-center">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('email') }}">
                        <div class="mb-2 space-x-2 rtl:space-x-reverse justify-center">
                            <div class="px-6">
                                <label for="verification-code" class="sr-only">Verification Code</label>
                                <input type="text" maxlength="6" id="verification-code" name="verification-code"
                                    minlength="6"
                                    class="w-full block h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div>
                        </div>

                        <p class="mt-2 text-sm text-gray-700 font-medium">
                            Please enter the 6-digit code sent to {{ session('email') }}.
                        </p>

                        <button type="submit"
                            class="py-1 px-10 rounded-md bg-[#293241] text-white mt-4 font-medium">SEND</button>
                    </form>

                </div>
                <form id="resend-form" action="{{ route('resend.code') }}" method="POST">
                    @csrf
                    <input type="hidden" name="resend-code-mail" value="{{ session('email') }}">
                    <button type="submit" id="resend-link" class="text-[#0E7BBB] m-3">Resend a
                        code</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    @if (session('counter'))
        <div id="counter-alert"
            class="fixed transition-opacity duration-300 ease-in-out inset-x-px max-w-lg mt-10 mx-auto top-0 flex justify-center z-50 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50">

            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-alert-octagon w-5 h-5 mx-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"> {{ session('counter') }}</span>
            </div>
        </div>
        <script>
            setTimeout(function() {
                var countDownAlert = document.getElementById('counter-alert');
                countDownAlert.style.opacity = 0;
                setTimeout(function() {
                    countDownAlert.style.display = 'none';
                }, 300);
            }, 4000);
        </script>
    @endif
    @include('alerts.error')
    @include('alerts.success')
</body>

</html>
