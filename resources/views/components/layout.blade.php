<!DOCTYPE html class="h-full bg-gray-900">
<html lang="en">

    <head>
        @vite('resources/js/app.js')

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @stack('meta')

        <title>Marek's example page</title>

    </head>

    <body>
        <x-nav-bar />
        @csrf

        <h1 class="text-5xl font-bold text-center m-4">{{ $heading }}</h1>

        <div>
            {{ $slot }}
        </div>

        <x-back-to-top />

    </body>

</html>
