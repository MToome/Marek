<!DOCTYPE html class="h-full bg-gray-900">
<html lang="en">

    <head>
        @vite('resources/js/app.js')



        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Marek's example page</title>


    </head>

    <body>
        <x-nav-bar />

        <h1 class="text-3xl font-bold text-center m-5">{{ $heading }}</h1>

        <div class="text-center">
            {{ $slot }}
        </div>

        <x-back-to-top />

    </body>

</html>
