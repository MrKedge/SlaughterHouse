<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Receive registration</title>
</head>

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}




        {{-- this is for the table inside --}}
        <div class="fixed">@include('admin.layout.admin-sidepanel')</div>


    </div>


</body>

</html>
