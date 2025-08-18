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

    <body class="">
        <nav class="navbar navbar-expand-sm justify-center bg-white">
            <div class="container-fluid justify-end ">
                <h2 class="mb-4 text-2xl text-green-700 font-bold">Select</h2>
                <select data-choose-theme class="focus:outline-none h-10 rounded-full px-3 border">
                    <option value="">Default</option>
                    <option value="dark">Dark</option>
                    <option value="black">Black</option>
                    <option value="🌸">🌸 Pink</option>
                    <option value="🐬">🐬 Blue</option>
                    <option value="🐤">🐤 Yellow</option>
                    <option value="val">val</option>
                    <option value="cupcake">cup</option>
                </select>
            </div>

        </nav>


    </body>

</html>
