<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite('resources/css/app.css')
</head>

<body>

    <img class="absolute h-full w-full mt-[-200px]" src="{{ asset('images/CowBg.png') }}" alt="image">
    <div class="flex justify-end absolute text-white mt-[-200px] ml-[1240px]">
        <span class="mr-4">About</span>
        <span class="mr-auto">Contact</span>
    </div>
    <div class="z-0 md:z-40 relative mx-auto w-[400px] bg-white mt-[200px] h-2/3 rounded-[25px] shadow-2xl">
        <h1 class="text-center text-4xl font-bold pt-5 pb-5">Sign Up</h1>
        <div class="font-semibold text-[20px]">
            <form class="" action="sign-up/store-admin" method="POST">
                @csrf
                <div class="flex justify-center p-2">
                    <div class="text-left mr-1"><label for="">First Name</label></div>
                    <div><input type="text" name="firstName" class="rounded-[20px] bg-gray-200"></div>
                </div>
                <div class="flex justify-center p-2">
                    <div class=" text-center mr-1"><label for="">Last Name</label></div>
                    <div><input type="text" name="lastName" class="rounded-[25px] bg-gray-200"></div>
                </div>
                <div class="flex justify-between mx-4">
                    <div class="w-4/12 px-2">
                        <h1>Role</h1>

                    </div>

                    <div class="w-10/12 mx-2">
                        <select name="role" id=""
                            class="w-full h-[30px] text-center  rounded-[20px] bg-gray-200">
                            <option value="client">Admin</option>
                            <option value="abbatoir">Abbatoir</option>
                            <option value="inspector">Inspector</option>
                            <option value="butcher">Butcher</option>
                        </select>
                    </div>
                </div>


                <div class="flex justify-center p-2">
                    <div class="w-[100px] text-centers"><label for="email">Email</label></div>
                    <div><input type="email" name="email" class="rounded-[25px] bg-gray-200"></div>
                </div>
                <div class="flex justify-center p-2">
                    <div class="w-[100px]"><label for="password" class="text-centers">Password</label></div>
                    <div><input type="password" name="password" class="rounded-[25px] bg-gray-200"></div>
                </div>
                <div class="flex justify-center p-2">
                    <div class="w-[100px]"><label for="confirm-password" class="text-centers">Confirm</label></div>
                    <div><input type="password" name="password_confirmation" class="rounded-[25px] bg-gray-200"></div>
                </div>
                <div class="block text-center p-2 pb-3"><button class="p-1 bg-blue-500 p-[2px] rounded-lg"
                        type="submit">Sign Up</button></div>
            </form>
        </div>
    </div>

</body>

</html>
