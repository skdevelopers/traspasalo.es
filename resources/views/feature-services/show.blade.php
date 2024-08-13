@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-5">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Feature Service Details</h1>

        <div class="mb-4">
            <p class="text-sm font-medium text-gray-700"><strong>ID:</strong> {{ $featureService->id }}</p>
            <p class="text-sm font-medium text-gray-700"><strong>Name:</strong> {{ $featureService->name }}</p>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('feature-services.edit', $featureService) }}" class="inline-flex justify-center items-center bg-yellow-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <i class="mgc_edit_line text-lg me-2"></i> Edit
            </a>
            <form action="{{ route('feature-services.destroy', $featureService) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex justify-center items-center bg-red-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                        onclick="return confirm('Are you sure you want to delete this feature service?')">
                    <i class="mgc_delete_line text-lg me-2"></i> Delete
                </button>
            </form>
            <a href="{{ route('feature-services.index') }}" class="inline-flex justify-center items-center bg-gray-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <i class="mgc_arrow_back_line text-lg me-2"></i> Back to List
            </a>
        </div>
    </div>
@endsection
