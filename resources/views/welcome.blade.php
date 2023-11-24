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

<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Side Panel -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-semibold mb-4">Side Panel</h1>

                <!-- First Dropdown Trigger -->
                <div class="relative group mb-4">
                    <button class="w-full py-2 px-4 bg-gray-700 hover:bg-gray-600 text-left">
                        Dropdown 1
                    </button>

                    <!-- First Dropdown Content -->
                    <div class="transition-all duration-300 overflow-hidden opacity-0 max-h-0">
                        <ul class="py-2 bg-gray-800">
                            <li class="hover:bg-gray-700 px-4 py-2">Item 1</li>
                            <li class="hover:bg-gray-700 px-4 py-2">Item 2</li>
                            <!-- Add more items as needed -->
                        </ul>
                    </div>
                </div>

                <!-- Second Dropdown Trigger -->
                <div class="relative group">
                    <button class="w-full py-2 px-4 bg-gray-700 hover:bg-gray-600 text-left">
                        Dropdown 2
                    </button>

                    <!-- Second Dropdown Content -->
                    <div class="transition-all duration-300 overflow-hidden opacity-0 max-h-0">
                        <ul class="py-2 bg-gray-800">
                            <li class="hover:bg-gray-700 px-4 py-2">Item A</li>
                            <li class="hover:bg-gray-700 px-4 py-2">Item B</li>
                            <!-- Add more items as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Your main content goes here -->
        </div>
    </div>

    <script>
        // JavaScript for Dropdown Toggles
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownTriggers = document.querySelectorAll('.group button');
            const dropdownContents = document.querySelectorAll('.group > .transition-all');

            dropdownTriggers.forEach((trigger, index) => {
                trigger.addEventListener('click', function() {
                    dropdownContents[index].classList.toggle(
                        'max-h-40'); // Adjust the max height based on your content
                    dropdownContents[index].classList.toggle('opacity-100');
                    dropdownContents[index].classList.toggle('opacity-0');
                });
            });
        });
    </script>

</body>

</html>
