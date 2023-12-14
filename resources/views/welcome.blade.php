<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/css/app.css')
    <title>under develop</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet"> --}}

</head>

<body class="bg-gray-500 h-screen flex items-center justify-center">

    <div class="flex justify-center items-center h-screen">

        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Header 1</th>
                    <th class="px-4 py-2">Header 2</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">Data 1</td>
                    <td class="border px-4 py-2">Data 2</td>
                    <td class="border px-4 py-2">

                        <button data-popover-target="popover-default" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default
                            popover</button>

                        <div data-popover id="popover-default" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Popover title</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>And here's some amazing content. It's very engaging. Right?</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>

                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>

</html>
