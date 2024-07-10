@extends('layouts.vertical', ['title' => 'Suppliers', 'sub_title' => 'Suppliers show'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4">
            <a href="{{ route('suppliers.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full ">
                <i class="mgc_add_line text-lg me-2"></i> Create New
            </a>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Display suppliers table or message -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="supplierTableBody">
                    <!-- Supplier rows will be populated here -->
                    </tbody>
                </table>
                <div id="noSuppliersMessage" class="mt-4 text-center text-gray-500">
                    <!-- Message displayed when no suppliers are available -->
                    No suppliers found. <a href="{{ route('suppliers.create') }}" class="text-blue-500 hover:underline">Create one</a>.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script to fetch and populate suppliers data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded'); // Check if this message appears in the console

            axios.get('/api/suppliers')
                .then(response => {
                    console.log('Axios Response:', response); // Log the entire Axios response
                    const suppliers = response.data;
                    console.log('suppliers:', suppliers); // Log the parsed suppliers data

                    const supplierTableBody = document.querySelector('#supplierTableBody');
                    const noSuppliersMessage = document.querySelector('#noSuppliersMessage');

                    // Clear existing rows
                    supplierTableBody.innerHTML = '';

                    if (suppliers.length > 0) {
                        console.log('suppliers array length:', suppliers.length); // Debug: Log suppliers array length

                        // Append new rows with supplier data
                        suppliers.forEach(supplier => {
                            console.log('Processing supplier:', supplier); // Debug: Log individual supplier

                            // Construct HTML row for the supplier
                            const row = `
                        <tr>
                            <td class="border px-4 py-2">${supplier.id}</td>
                            <td class="border px-4 py-2">${supplier.name}</td>
                            <td class="border px-4 py-2">${supplier.email}</td>
                            <td class="border px-4 py-2">${supplier.address}</td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                                <a href="/suppliers/${supplier.id}/edit" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                <form action="/suppliers/${supplier.id}" method="POST" class="inline">
                                    @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5" onclick="return confirm('Are you sure you want to delete this supplier?')">
                                <i class="mgc_delete_line text-xl"></i>
                            </button>
                        </form>
                        <a href="/suppliers/${supplier.id}" class="text-green-500 hover:text-green-700 mx-0.5">
                                    <i class="mgc_display_line text-lg"></i>
                                </a>
                            </td>
                        </tr>
                    `;

                            // Insert the row into the table body
                            supplierTableBody.insertAdjacentHTML('beforeend', row);
                        });

                        // Show table if suppliers exist
                        supplierTableBody.style.display = 'table-row-group';
                        noSuppliersMessage.style.display = 'none';
                    } else {
                        // Show message and create button if no suppliers
                        supplierTableBody.style.display = 'none';
                        noSuppliersMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Axios Error:', error); // Log any Axios errors
                });
        });

    </script>
@endpush
