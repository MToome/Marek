<div {{ $attributes->merge(['class' => 'dropdown dropdown-end']) }}>
    <div tabindex="0" >
        <button class="btn btn-outline btn-primary rounded-md px-3 py-2 text-sm font-medium m-1">Theme</button>
    </div>

    <ul tabindex="0"
        class="dropdown-content bg-base-200 rounded-box z-[1]  max-h-60 overflow-y-auto overflow-x-hidden p-2 shadow w-46 font-bold">

            @foreach ($themes as $theme => $icon)
                <ul class="menu">
                    <li>
                        <a onclick="setTheme('{{ $theme }}')">{{ $icon }}{{ ucfirst($theme) }}</a>
                    </li>
                </ul>

                @endforeach
    </ul>
</div>

@once
    <script>
        function setTheme(theme) {
            document.documentElement.setAttribute("data-theme", theme);
            localStorage.setItem("theme", theme);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const savedTheme = localStorage.getItem("theme") || "light";
            document.documentElement.setAttribute("data-theme", savedTheme);
        });
    </script>
@endonce


