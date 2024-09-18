<!-- resources/views/subcategories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Subcategories', 'sub_title' => 'Manage Subcategories'])

@section('content')

@if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Subcategories</h1>

        <div class="mb-4">
            <a href="{{ route('subcategories.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700">
                <i class="mgc_add_line text-lg"></i> Create New Subcategory
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-md shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Subcategory Name</th>
                        <th class="px-4 py-2 text-left">Parent Category</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcategories as $subcategory)
                        <tr class="border-t">
                            <td class="border px-4 py-2">{{ $subcategory->id }}</td>
                            <td class="border px-4 py-2">{{ $subcategory->name }}</td>
                            <td class="border px-4 py-2">{{ $subcategory->parent ? $subcategory->parent->name : 'No Parent' }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No subcategories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
