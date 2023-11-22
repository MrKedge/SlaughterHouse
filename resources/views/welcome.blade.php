<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>under develop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-[#D5DFE8] overflow-hidden">







    <form action="{{ route('store.animal') }}" method="POST" class="flex w-full justify-center relative">
        @csrf
        <h1 class="font-bold text-lg italic">Animal Information</h1>
        <label class="block pb-1 pt-3" for="">Animal:</label>
        <select name="kindOfAnimal" id="typeOfAnimal" required class=" border-2 border-black rounded-md p-2 w-full">
            <option value="" disabled selected>select</option>
            <option value="cow">Cow</option>
            <option value="goat">Goat</option>
            <option value="horse">Horse</option>
            <option value="swine">Swine</option>
            <option value="carabao">Carabao</option>
        </select>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Register
        </button>

        <a href="{{ route('client.overview') }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Cancel
        </a>
        <div class="flex justify-center">
            <canvas class="border-2 border-black " id="canvas"></canvas>
        </div>

        </div>
        </div>
    </form>









</body>

</html>
