<!DOCTYPE html class="h-full bg-gray-900">
<html lang="en">

    <head>
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')

        <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Marek's example page</title>


    </head>

    <body >
        <x-nav-bar/>
        <h1 class="text-3xl font-bold text-center">{{ $heading }}</h1>

        <div class="text-center">
            {{ $slot}}
        </div>
    </body>

</html>
