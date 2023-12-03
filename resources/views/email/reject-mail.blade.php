<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Update On Animal Status</h1>
    <p>Your Animal <span class="font-semibold ">{{ $animal_type }}</span> registration form has been <em
            class="font-semibold">{{ $animal_status }}</em> with the id of
        <span class="font-semibold ">{{ $animal_id }}</span>
    </p>
    <h1>Remarks:</h1>
    <p>{{ $animal_remarks }}</p>
</body>

</html>
