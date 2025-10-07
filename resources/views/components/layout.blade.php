<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/js/app.js')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/vanilla-datatables@1.10.1/dist/vanilla-dataTables.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('meta')
    <title>Marek's example page</title>
</head>

<body class="h-full ">
    <x-nav-bar />
    
    <h1 class="text-5xl font-bold text-center m-4">{{ $heading }}</h1>

    <div>
        {{ $slot }}
    </div>
    
    <x-back-to-top />

    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@1.10.1/dist/vanilla-dataTables.min.js"></script>

    {{ $scripts ?? '' }}


</body>

</html>