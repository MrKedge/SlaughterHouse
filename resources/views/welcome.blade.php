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

    <div class="bg-white p-6 rounded shadow-md">
        <p>Original Date: 2023-11-24 20:20:48</p>
        <p>Formatted Date: <span id="formattedDate"></span></p>
    </div>

    <script>
        const originalDate = new Date("2023-11-24T20:20:59");
        const formattedDate = originalDate.toLocaleString('en-US', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        });

        document.getElementById('formattedDate').textContent = formattedDate;
    </script>

</body>

</html>
