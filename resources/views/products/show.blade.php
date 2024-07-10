<!-- resources/views/products/show.blade.php -->

@extends('layouts.vertical', ['title' => 'Products Rex ERP', 'sub_title' => 'Products', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Product Details</h2>
                <div>
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p><strong>Unit:</strong> {{ $product->unit }}</p>
                    <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </div>
    </div>
@endsection
