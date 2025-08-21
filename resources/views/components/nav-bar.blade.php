<nav class="navbar navbar-expand-sm items-center justify-between bg-base-200">
    <div>
        <h1>Hello</h1>
    </div>

    <div>
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
    </div>

    <div>
        <x-theme-dropdown />
    </div>

</nav>
