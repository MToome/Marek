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
        <nav class="navbar navbar-expand-sm items-center justify-between bg-white">
            <div>
                <h1>h</h1>
            </div>

            <div >
                <h2>
                    h
                </h2>
            </div>

            <div>
                <x-theme-dropdown />
            </div>

        </nav>


    </body>

</html>
