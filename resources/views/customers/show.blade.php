<!-- resources/views/customers/show.blade.php -->
@extends('layouts.vertical', ['title' => 'Clients Details', 'sub_title' => 'Clients'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <h1 class="text-2xl font-semibold">Client Details</h1>
            <div class="mt-4">
                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Address:</strong> {{ $customer->address }}</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
@endsection
