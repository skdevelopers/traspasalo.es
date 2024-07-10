import { Grid, html } from "gridjs";

document.addEventListener('DOMContentLoaded', function () {
    new Grid({
        columns: [
            'Name',
            'Description',
            'Category',
            'Subcategory',
            'Sub-Subcategory',
            'Quantity',
            'Unit',
            'Unit Price',
            {
                name: 'Actions',
                formatter: (cell, row) => html(`
                    <a href="{{ route('products.edit', row.cells[0].data) }}" class="text-blue-500 hover:text-blue-700 mx-0.5">
                        <i class="mgc_edit_line text-lg"></i>
                    </a>
                    <form action="{{ route('products.destroy', row.cells[0].data) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5">
                            <i class="mgc_delete_line text-xl"></i>
                        </button>
                    </form>
                    <a href="{{ route('products.show', row.cells[0].data) }}" class="text-green-500 hover:text-green-700 mx-0.5">
                        <i class="mgc_display_line text-lg"></i>
                    </a>
                `)
            }
        ],
        pagination: true,
        sort: true,
        search: true,
        data: '{{ json_encode($products) }}'
    }).render(document.getElementById('products-table'));
});
