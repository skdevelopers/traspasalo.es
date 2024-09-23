@extends('layouts.vertical', ['title' => 'Display Businesses', 'sub_title' => 'Business'])

@section('content')

<div class="container mx-auto bg-white px-4 py-10 rounded-lg shadow-md my-10">
    <div class="mb-6">
        <h3 class="text-2xl font-semibold mb-6">Business List</h3>
        <a href="{{ route('business.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Business
        </a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-3 px-6 text-left">Title</th>
                <th class="py-3 px-6 text-left">Category</th>
                <th class="py-3 px-6 text-left">Subcategory</th>
                <th class="py-3 px-6 text-left">Description</th>
                <th class="py-3 px-6 text-left">Location</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($businesses as $business)
                <tr class="border-b border-gray-200">
                    <!-- Title -->
                    <td class="py-3 px-6">
                        {{ $business->business_title }}
                    </td>

                    <!-- Category -->
                    <td class="py-3 px-6">
                        {{ $business->category->name ?? 'N/A' }}
                    </td>

                    <!-- Subcategory -->
                    <td class="py-3 px-6">
                        {{ $business->subcategory->name ?? 'N/A' }}
                    </td>

                    <!-- Description -->
                    <td class="py-3 px-6">
                        {{ Str::limit($business->description, 50) }} <!-- Shorten the description -->
                    </td>

                    <!-- Location -->
                    <td class="py-3 px-6">
                        {{ $business->location }}
                    </td>

                    <!-- Actions: Show, Edit, Delete -->
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center space-x-4">
                            <!-- Show -->
                            <a href="{{ route('business.show', $business->id) }}" class="text-green-500 hover:text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3a7 7 0 100 14A7 7 0 0010 3zM9 8h2v3H9V8zm0 4h2v2H9v-2z" />
                                </svg>
                            </a>
                    
                            <!-- Edit -->
                            <a href="{{ route('business.edit', $business->id) }}" class="text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L6 11.172V14h2.828l8.586-8.586a2 2 0 000-2.828zM5 12v3h3l9-9-3-3-9 9z"/>
                                </svg>
                            </a>
                    
                            <!-- Delete (with confirmation) -->
                            <form action="{{ route('business.delete', $business->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this business?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h1v10a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 100-2h-4V3a1 1 0 00-2 0v1H7V3a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>              
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
