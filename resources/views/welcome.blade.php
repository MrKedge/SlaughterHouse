<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blur Background on Button Click</title>
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Add a CSS class for blurred background */
        .blur-background {
            filter: blur(8px);
            /* Adjust the blur intensity as needed */
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen bg-gray-200">

    <!-- Your page content goes here -->

    <!-- Button to trigger the blur effect -->
    <button id="blurButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Blur Background
    </button>

    <!-- Popup (hidden by default) -->
    <div id="popup"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded shadow-lg">
        <!-- Popup content goes here -->
        This is the popup content
    </div>

    <!-- Include Tailwind CSS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>

    <!-- Your JavaScript code goes here -->
    <script>
        document.getElementById('blurButton').addEventListener('click', function() {
            document.body.classList.toggle('blur-background');
            document.getElementById('popup').classList.toggle('hidden');
        });
    </script>

</body>

</html>
