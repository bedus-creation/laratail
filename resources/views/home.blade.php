<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <h1 class="text-2xl text-center mt-20"> Welcome to Laratail</h1>
    <p class="text-base text-center">a complete stater template</p>
    <p class="text-center mt-1 hover:text-green-600">
        <a href="{{route('login')}}">Login</a>
    </p>
    <p class="mt-2 text-red-500 text-center">Email: root@web2tailwind.com</p>
    <p class="text-red-500 text-center">Pass: password</p>
</body>

</html>
