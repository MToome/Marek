{{-- Toast container --}}
<div id="toast" class="toast toast-top toast-center hidden">
    <div class="alert alert-info">
        <span id="toast-message"></span>
    </div>
</div>

@once
    <script>
        function showToast(message) {
            const toast = document.getElementById("toast");
            const msg = document.getElementById("toast-message");

            // Pop up the message
            msg.textContent = message;
            toast.classList.remove("hidden");

            // Hidde message
            setTimeout(() => {
                toast.classList.add("hidden");
            }, 2000);
        }
    </script>
@endonce
