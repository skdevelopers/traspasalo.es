<!-- resources/views/suppliers/show.blade.php -->
@extends('layouts.vertical', ['title' => 'Supplier Details', 'sub_title' => 'Suppliers'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <h1 class="text-2xl font-semibold">Supplier Details</h1>
            <div class="mt-4">
                <p><strong>Name:</strong> {{ $supplier->name }}</p>
                <p><strong>Email:</strong> {{ $supplier->email }}</p>
                <p><strong>Address:</strong> {{ $supplier->address }}</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
@endsection
