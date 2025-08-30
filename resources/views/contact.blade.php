<x-layout>
    <x-slot:heading>
        Contact
    </x-slot:heading>

    <div class="text-center mt-4">
        {{-- Email --}}
        <div>
            <p>Email:
                {{-- Copy button --}}
                <input id="copyText" class="input input-bordered w-48 text-center" type="text" value="marektoome0@gmail.com"
                    readonly>
                <button class="btn " onclick="copyToClipboard()">Copy</button>
            </p>
            <x-toast />
            <x-copy-to-clipboard />
        </div>

        <p class="m-2">LinkedIn: <a class="text-info underline" href="https://www.linkedin.com/in/marek-toome/">Marek Toome</a> </p>
        <p>Github: <a class="text-info underline" href="https://github.com/MToome">MToome</a></p>

        <img src=" https://picsum.photos/500/3000" >
    </div>


</x-layout>
