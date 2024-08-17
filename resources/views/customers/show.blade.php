@extends('layouts.vertical', ['title' => 'Clients Details', 'sub_title' => 'Clients'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <h1 class="text-2xl font-semibold">Client Details</h1>
            <div class="mt-4">
                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Job:</strong> {{ $customer->job_position }}</p>
                <p><strong>Description:</strong> {{ $customer->description }}</p>
                <p><strong>Image:</strong></p>
                <img src="{{ $customer->getFirstMediaUrl('customers') }}" alt="{{ $customer->name }}" class="h-32 w-32 object-cover rounded">
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
@endsection
