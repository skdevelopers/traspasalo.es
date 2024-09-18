<!-- resources/views/subcategories/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Edit Subcategory', 'sub_title' => 'Subcategory'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Subcategory</h1>

        <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Subcategory Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Subcategory Name</label>
                <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('name', $subcategory->name) }}" required>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Parent Category Selection -->
            <div class="mb-4">
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                <select name="parent_id" id="parent_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('parent_id', $subcategory->parent_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Subcategory Image</label>
                <input type="file" name="image" id="image" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @if($subcategory->getFirstMediaUrl('images'))
                    <img src="{{ $subcategory->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $subcategory->name }}" class="w-24 h-24 object-cover mt-2">
                @endif
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
@endsection
