<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <body>
        <p>
            Hi! {{ $userFirstName }}
        </p>

        <p>
            Thank you for registering with our website. Please use this code below to verify your email address:
        </p>

        <h1>{{ $verificationCode }}</h1>

        <p>
            If you did not create an account, you can safely ignore this email.
        </p>
    </body>
</body>

</html>
