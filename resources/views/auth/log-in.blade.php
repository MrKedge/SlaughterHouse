<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>log-in</title>
</head>

<body>
    <div class="absolute text-white flex justify-end w-full z-10">
        <span class="mr-1">About</span>
        <span class="mr-1">Contact</span>
    </div>
    <div class="">
        <img src="{{ asset('images/CowBg.png') }}" alt="image" class="z-0 absolute h-full w-full">

        <div class="absolute bg-white text-center top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div>
                <h1>LOG IN</h1>
            </div>
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf
                <div class="flex">
                    <div class=""><label for="email">Email</label></div>
                    <div><input type="email" name="email"></div>
                </div>
                <div class="flex">
                    <div><label for="password">Password</label></div>
                    <div><input type="password" name="password"></div>
                    <div></div>
                </div>
                <div>
                    <a href="">Forgot Password?</a>
                </div>
                <div>
                    <button class="p-1 bg-blue-500 p-[2px] rounded-lg" type="submit">LOG IN</button>
                </div>
                <div>
                    <p>Don't have an Account?</p>
                    <a href="">Create an Account</a>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
