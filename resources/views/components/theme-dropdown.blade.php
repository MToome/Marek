<div {{ $attributes->merge(['class' => 'dropdown dropdown-end rounded-box']) }}>
    <div tabindex="0" class="btn m-1">
        Theme
    </div>

    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-4x1 z-[1] w-56 m-h-10 overflow-auto">
        @foreach ($themes as $theme)
            <li>
                <a onclick="setTheme('{{ $theme }}')">{{ ucfirst($theme) }}</a>
            </li>
        @endforeach
    </ul>

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

</div>
