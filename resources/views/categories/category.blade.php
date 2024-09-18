<!-- resources/views/categories/create.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Category', 'sub_title' => 'Category'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Category</h1>

        <!-- Form for creating a new category -->
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Category Name Input -->
            <div class="col-span-12">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload Input -->
            <div class="col-span-12">
                <label for="image" class="block text-sm font-medium text-gray-700">Category Image</label>
                <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="image" name="image">
                @error('image')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="col-span-12">
                <button type="submit" class="w-full inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="mgc_save_line text-lg me-2"></i> Create
                </button>
            </div>
        </form>
    </div>
@endsection
