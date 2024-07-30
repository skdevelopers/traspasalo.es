@extends('layouts.vertical', ['title' => 'Show Permission'])

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Show Permission</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="mb-4"><strong class="text-gray-700">Name:</strong> <span class="text-gray-900">{{ $permission->name }}</span></p>
            <p class="mb-4"><strong class="text-gray-700">Description:</strong> <span class="text-gray-900">{{ $permission->description }}</span></p>
            <!-- Add more details if needed -->
        </div>
    </div>
@endsection
