<!-- resources/views/categories/create.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Category', 'sub_title' => 'Category'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Icon Class</label>
                <input type="text" name="icon_class" id="icon_class" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('icon_class') }}" required>
                @error('icon_class')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Category Image</label>
                <input type="file" name="image" id="image" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Create</button>
            </div>
        </form>
    </div>
@endsection
