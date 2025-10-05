<x-layout heading="Car Parts Table">
    <div class="overflow-x-auto">
        <table id="csvTable" class="min-w-full border border-gray-300 rounded-md text-sm">
            <thead id="tableHead" class="bg-gray-800 text-white"></thead>
            <tbody id="tableBody" class="divide-y divide-gray-200"></tbody>
        </table>
    </div>

    <x-slot:scripts>
        <script>
            fetch(@json(route('parse.csv')))
                .then(res => res.json())
                .then(data => {
                    const headers = data.headers;
                    const rows = data.rows;

                    // Build table header
                    let headHtml = '<tr>';
                    headers.forEach(h => headHtml += `<th class="px-4 py-2 text-left">${h}</th>`);
                    headHtml += '</tr>';
                    document.getElementById('tableHead').innerHTML = headHtml;

                    // Build table body
                    let bodyHtml = '';
                    rows.forEach(row => {
                        bodyHtml += '<tr class="hover:bg-gray-50">';
                        headers.forEach(h => {
                            bodyHtml += `<td class="px-4 py-2">${row[h] ?? ''}</td>`;
                        });
                        bodyHtml += '</tr>';
                    });
                    document.getElementById('tableBody').innerHTML = bodyHtml;

                    // Initialize Vanilla-DataTable
                    new DataTable('#csvTable', {
                        perPage: 25,
                        perPageSelect: [10, 25, 50, 100],
                        labels: {
                            placeholder: "Search...",
                            perPage: "{select} rows per page",
                            noRows: "No data found",
                            info: "Showing {start}–{end} of {rows} entries"
                        }
                    });
                })
                .catch(err => console.error('Error loading CSV:', err));

        </script>
    </x-slot:scripts>
</x-layout>