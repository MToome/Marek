<x-layout>


    <x-slot:heading>
        CSV parsing
    </x-slot:heading>

    <form method="POST" action="/csv_read" class="text-center">
        @csrf

        <div id="csvData" class="text-center">r</div>

    </form>

    <script>
        fetch("{{ route('parse.csv') }}")
            .then(response => response.json())
            .then(response => {
                let html = "<ul>";
                response.forEach(row => {
                    // row array to a string for display
                    html += `<li>${row.join(", ")}</li>`;
                });
                document.getElementById("csvData").innerHTML = html;
            })
            .catch(error => {
                console.error("Error fetching CSV data:", error);
                document.getElementById("csvData").innerHTML = "Failed to load data.";
            });
    </script>



</x-layout>
