<nav class="navbar items-center w-full flex fixed-top bg-base-200 z-50 py-2 px-4">
    <div class="flex-shrink-0">
        <h1 class="font-bold">Marek Toome</h1>
    </div>

    <div class="absolute left-1/2 transform -translate-x-1/2 flex">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        <x-nav-link href="/calculator" :active="request()->is('calculator')">Calculator</x-nav-link>
    </div>

    <div class="ml-auto">
        <x-theme-dropdown class="m-1"/>
    </div>

</nav>
