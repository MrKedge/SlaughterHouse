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

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Laravel App</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-100">

        <!-- Your main content goes here -->
        <div class="flex h-screen bg-gray-200">

            <!-- Side Panel -->
            <div id="sidePanel"
                class="fixed top-0 left-0 h-full bg-white shadow-lg transform -translate-x-full w-240 transition-transform duration-300 ease-in-out">
                <!-- Your side panel content goes here -->
                <p class="p-4">Side Panel Content</p>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-10">
                <!-- Your main content goes here -->
                <button id="toggleButton" class="bg-blue-500 text-white px-4 py-2">Toggle Side Panel</button>
            </div>
        </div>

        <!-- Your JavaScript code goes here -->
        <script>
            const sidePanel = document.getElementById('sidePanel');
            const toggleButton = document.getElementById('toggleButton');

            toggleButton.addEventListener('click', () => {
                sidePanel.classList.toggle('-translate-x-full');
            });
        </script>

    </body>

    </html>
</body>

</html>
