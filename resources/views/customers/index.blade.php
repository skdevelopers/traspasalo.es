@extends('layouts.vertical', ['title' => 'Customers', 'sub_title' => 'Customers'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4">
            <a href="{{ route('customers.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full ">
                <i class="mgc_add_line text-lg me-2"></i> Create New
            </a>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Display customers table or message -->
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
                    <tbody id="customerTableBody">
                    <!-- Customer rows will be populated here -->
                    </tbody>
                </table>
                <div id="noCustomersMessage" class="mt-4 text-center text-gray-500">
                    <!-- Message displayed when no customers are available -->
                    No customers found. <a href="{{ route('customers.create') }}" class="text-blue-500 hover:underline">Create one</a>.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script to fetch and populate customers data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded'); // Check if this message appears in the console

            axios.get('/api/customers')
                .then(response => {
                    console.log('Axios Response:', response); // Log the entire Axios response
                    const customers = response.data;
                    console.log('Customers:', customers); // Log the parsed customers data

                    const customerTableBody = document.querySelector('#customerTableBody');
                    const noCustomersMessage = document.querySelector('#noCustomersMessage');

                    // Clear existing rows
                    customerTableBody.innerHTML = '';

                    if (customers.length > 0) {
                        console.log('Customers array length:', customers.length); // Debug: Log customers array length

                        // Append new rows with customer data
                        customers.forEach(customer => {
                            console.log('Processing customer:', customer); // Debug: Log individual customer

                            // Construct HTML row for the customer
                            const row = `
                        <tr>
                            <td class="border px-4 py-2">${customer.id}</td>
                            <td class="border px-4 py-2">${customer.name}</td>
                            <td class="border px-4 py-2">${customer.email}</td>
                            <td class="border px-4 py-2">${customer.address}</td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                                <a href="/customers/${customer.id}/edit" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                <form action="/customers/${customer.id}" method="POST" class="inline">
                                    @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5" onclick="return confirm('Are you sure you want to delete this customer?')">
                                <i class="mgc_delete_line text-xl"></i>
                            </button>
                        </form>
                        <a href="/customers/${customer.id}" class="text-green-500 hover:text-green-700 mx-0.5">
                                    <i class="mgc_display_line text-lg"></i>
                                </a>
                            </td>
                        </tr>
                    `;

                            // Insert the row into the table body
                            customerTableBody.insertAdjacentHTML('beforeend', row);
                        });

                        // Show table if customers exist
                        customerTableBody.style.display = 'table-row-group';
                        noCustomersMessage.style.display = 'none';
                    } else {
                        // Show message and create button if no customers
                        customerTableBody.style.display = 'none';
                        noCustomersMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Axios Error:', error); // Log any Axios errors
                });
        });

    </script>
@endpush
