<div {{ $attributes->merge(['class' => 'dropdown dropdown-end']) }}>
    <div tabindex="0" class="btn m-1">
        Theme
    </div>

    <ul tabindex="0"
        class="dropdown-content menu bg-base-200 rounded-box z-[1] w-56 max-h-60 overflow-auto p-2 shadow">
        @foreach ($themes as $theme)
            <li>
                <a onclick="setTheme('{{ $theme }}')">{{ ucfirst($theme) }}</a>
            </li>
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
