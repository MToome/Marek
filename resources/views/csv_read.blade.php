<x-layout heading="Car Parts Table">
    <div class="overflow-x-auto">

        <div>
            <input type="text" id="searchInput" placeholder="Search ..."
                class="rounded-md px-3 py-2 text-sm font-medium m-1">
        </div>

        <div id="pagination" class="flex justify-center items-center gap-3 mt-4"></div>
        <div id="tableContainer"></div>
        <table id="csvTable" class="min-w-full border border-inherit rounded-md text-sm">

            <thead id="tableHead" class="bg-base-400"></thead>
            <tbody id="tableBody" class="divide-y divide-inherit"></tbody>
        </table>
    </div>



    <x-slot:scripts>
        <script>
            let currentPage = 1;
            let perPage = 25;
            let searchQuery = '';

            async function searchTable(page = 1) {
                try {
                    const routeParse = @json(route('parse.csv'));
                    const url = `${routeParse}?page=${page}&perPage=${perPage}&search=${encodeURIComponent(searchQuery)}`;
                    const response = await fetch(url);
                    const result = await response.json();

                    const tableContainer = document.getElementById('tableContainer');
                    tableContainer.innerHTML = '';

                    const table = document.createElement('table');
                    table.classList.add('border', 'border-collapse', 'w-full');
                    table.innerHTML = `
                                        <thead>
                                            <tr>${result.headers.map(h => `<th class="border px-4 py-2">${h}</th>`).join('')}</tr>
                                        </thead>
                                        <tbody>
                                            ${result.rows.map(r => `
                                                        <tr>
                                                            ${result.headers.map(h => `<td class="border px-4 py-2">${r[h] ?? ''}</td>`).join('')}
                                                        </tr>
                                                    `).join('')}
                                        </tbody>
                                        `;
                    tableContainer.appendChild(table);
                } catch (error) {
                    console.error("Error loading CSV:", error);
                }
            }


            function loadTable(page = 1) {
                fetch(`${@json(route('parse.csv'))}?page=${page}&perPage=${perPage}`)
                    .then(res => res.json())
                    .then(data => {
                        const headers = data.headers;
                        const rows = data.rows;
                        const pagination = data.pagination;

                        const tableHead = document.getElementById('tableHead');
                        const tableBody = document.getElementById('tableBody');
                        const paginationDiv = document.getElementById('pagination');

                        // Ensure elements exist before using
                        // if (!paginationDiv) {
                        //     console.error('Table structure missing in HTML.');
                        //     return;
                        // }

                        // Build header
                        let headHtml = '<tr>';
                        headers.forEach(h => headHtml += `<th class="px-4 py-2 text-left">${h}</th>`);
                        headHtml += '</tr>';
                        tableHead.innerHTML = headHtml;

                        // Build body
                        let bodyHtml = '';
                        rows.forEach(row => {
                            bodyHtml += '<tr class="hover:bg-base-200">';
                            headers.forEach(h => {
                                bodyHtml += `<td class="px-4 py-2">${row[h] ?? ''}</td>`;
                            });
                            bodyHtml += '</tr>';
                        });
                        tableBody.innerHTML = bodyHtml;

                        // Build pagination
                        let paginationHtml = '';
                        if (pagination.page > 1) {
                            paginationHtml += `<button class="btn btn-info px-3 py-1 rounded" onclick="loadTable(${pagination.page - 1})">Prev</button>`;
                        }
                        paginationHtml += `<span class="px-3">Page ${pagination.page} of ${pagination.totalPages}</span>`;
                        if (pagination.page < pagination.totalPages) {
                            paginationHtml += `<button class="btn btn-info px-3 py-1 rounded" onclick="loadTable(${pagination.page + 1})">Next</button>`;
                        }
                        paginationDiv.innerHTML = paginationHtml;
                    })
                    .catch(err => console.error('Error loading CSV:', err));
            }

            document.getElementById('searchInput').addEventListener('input', (e) => {
                searchQuery = e.target.value;
                currentPage = 1;
                loadTable(currentPage);
                searchTable(currentPage);
            })

            document.addEventListener('DOMContentLoaded', () => loadTable());
        </script>

    </x-slot:scripts>
</x-layout>