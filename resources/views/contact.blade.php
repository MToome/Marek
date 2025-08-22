<x-layout>
    <x-slot:heading>
        Contact
    </x-slot:heading>

    {{-- Email --}}
    <div>
        <p>Email:</p>
        {{-- Copy button --}}
        <input id="copyText" class="input input-bordered w-64" type="text" value="marektoome0@gmail.com" readonly>
        <button class="btn btn-accent" onclick="copyToClipboard()">Copy</button>

        <x-toast />
        <x-copy-to-clipboard />
    </div>

    <p>LinkedIn: <a class="text-info underline" href="https://www.linkedin.com/in/marek-toome/">Marek Toome</a> </p>
    <p>Github: <a class="text-info underline" href="https://github.com/MToome">MToome</a></p>



</x-layout>
