<script>
    function copyToClipboard() {
        const text = document.getElementById("copyText").value;
        navigator.clipboard.writeText(text).then(() => {
            showToast("Copied: " + text);
        });
    }
</script>
