<!-- resources/views/products/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Products Rex ERP', 'sub_title' => 'Products', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="grid grid-cols-12">
        <div class="col-span-6">
            <h2>Product List</h2>
            <div class="mb-4">
                <a href="{{ route('products.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                    <i class="mgc_add_line text-lg me-2"></i> Create New
                </a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Display products table or message -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Subcategory</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Unit</th>
                        <th class="px-4 py-2">Unit Price</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="productTableBody">
                    <!-- Product rows will be populated here -->
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->description }}</td>
                            <td class="border px-4 py-2">{{ $product->category->name }}</td>
                            <td class="border px-4 py-2">{{ optional($product->subcategory)->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $product->quantity }}</td>
                            <td class="border px-4 py-2">{{ $product->unit }}</td>
                            <td class="border px-4 py-2">{{ $product->unit_price }}</td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="mgc_delete_line text-xl"></i>
                                    </button>
                                </form>
                                <a href="{{ route('products.show', $product->id) }}" class="text-green-500 hover:text-green-700 mx-0.5">
                                    <i class="mgc_display_line text-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="noProductsMessage" class="mt-4 text-center text-gray-500">
                    <!-- Message displayed when no products are available -->
                    No products found. <a href="{{ route('products.create') }}" class="text-blue-500 hover:underline">Create one</a>.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script to fetch and populate products data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            axios.get('/api/products')
                .then(response => {
                    const products = response.data;
                    const productTableBody = document.querySelector('#productTableBody');
                    const noProductsMessage = document.querySelector('#noProductsMessage');

                    // Clear existing rows
                    productTableBody.innerHTML = '';

                    if (products.length > 0) {
                        // Append new rows with product data
                        products.forEach(product => {
                            // Construct HTML row for the product
                            const row = `
                                <tr>
                                    <td class="border px-4 py-2">${product.name}</td>
                                    <td class="border px-4 py-2">${product.description}</td>
                                    <td class="border px-4 py-2">${product.category.name}</td>
                                    <td class="border px-4 py-2">${product.subcategory ? product.subcategory.name : 'N/A'}</td>
                                    <td class="border px-4 py-2">${product.quantity}</td>
                                    <td class="border px-4 py-2">${product.unit}</td>
                                    <td class="border px-4 py-2">${product.unit_price}</td>
                                    <td class="border px-4 py-2 whitespace-nowrap">
                                        <a href="/products/${product.id}/edit" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                            <i class="mgc_edit_line text-lg"></i>
                                        </a>
                                        <form action="/products/${product.id}" method="POST" class="inline">
                                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5" onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="mgc_delete_line text-xl"></i>
                            </button>
                        </form>
                        <a href="/products/${product.id}" class="text-green-500 hover:text-green-700 mx-0.5">
                                            <i class="mgc_display_line text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;

                            // Insert the row into the table body
                            productTableBody.insertAdjacentHTML('beforeend', row);
                        });

                        // Show table if products exist
                        productTableBody.style.display = 'table-row-group';
                        noProductsMessage.style.display = 'none';
                    } else {
                        // Show message and create button if no products
                        productTableBody.style.display = 'none';
                        noProductsMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Axios Error:', error); // Log any Axios errors
                });
        });
    </script>
@endpush
