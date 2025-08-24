<button onclick="scrollToTop()" id="backToTopBtn" class="btn btn-accent hidden fixed bottom-5 right-6 z-50">Top</button>

<script>
    // Cheks if to show button
    window.onscroll = function() {
        // Elemendi Id otsib nupu
        const btn = document.getElementById("backToTopBtn");
        // body.scrollTop töötab osade browseritega, documentElement.scrollTop töötab enamus kaasaaegsete browseritega
        if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
            btn.classList.remove("hidden")
        } else {
            btn.classList.add("hidden")
        }
    };

    // smooth scrolling to top
    function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>

