@extends('layouts.vertical', ['title' => 'Products Rex ERP', 'sub_title' => 'Products', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Product List</h2>
                <div class="mb-4">
                    <a href="{{ route('products.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full fc-dropdown">
                        <i class="mgc_add_line text-lg me-2"></i> Create New
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table" id="products-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Sub-Subcategory</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Table rows will be populated dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script >

        document.addEventListener('DOMContentLoaded', function () {
            axios.get("{{ route('products.index') }}")
                .then(response => {
                    const products = response.data;
                    const tableBody = document.querySelector('#products-table tbody');
                    let tableRows = '';

                    products.forEach(product => {
                        tableRows += `
                            <tr>
                                <td>${product.name}</td>
                                <td>${product.description}</td>
                                <td>${product.category ? product.category.name : 'N/A'}</td>
                                <td>${product.subcategory ? product.subcategory.name : 'N/A'}</td>
                                <td>${product.subSubcategory ? product.subSubcategory.name : 'N/A'}</td>
                                <td>${product.quantity}</td>
                                <td>${product.unit}</td>
                                <td>${product.unit_price}</td>
                                <td>
                                    <a href="{{ url('products') }}/${product.id}/edit" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                        <i class="mgc_edit_line text-lg"></i>
                                    </a>
                                    <form action="{{ url('products') }}/${product.id}" method="POST" class="inline">
                                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5">
                            <i class="mgc_delete_line text-xl"></i>
                        </button>
                    </form>
                    <a href="{{ url('products') }}/${product.id}" class="text-green-500 hover:text-green-700 mx-0.5">
                                        <i class="mgc_display_line text-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });

                    tableBody.innerHTML = tableRows;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    </script>
@endsection
