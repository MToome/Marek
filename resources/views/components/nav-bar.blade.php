<nav class="navbar navbar-expand-sm items-center fixed-top justify-between bg-base-200 z-50">
    <div>
        <h1 class="font-bold">Marek Toome</h1>
    </div>

    <div>
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/cv" :active="request()->is('cv')">CV</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
    </div>

    <div>
        <x-theme-dropdown />
    </div>

</nav>
