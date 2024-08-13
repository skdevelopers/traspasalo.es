<!-- resources/views/blogs/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Blog', 'sub_title' => 'Blogs'])

@section('content')
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Blogs</h2>
        <a href="{{ route('blogs.create') }}" class="inline-flex items-center bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-6">
            <i class="mgc_add_line text-lg me-2"></i> Create New Blog
        </a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-md shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700">Title</th>
                        <th class="px-4 py-2 text-left text-gray-700">Date</th>
                        <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                    @foreach($blogs as $blog)
                        <tr class="border-t">
                            <td class="border px-4 py-2">{{ $blog->title }}</td>
                            <td class="border px-4 py-2">{{ $blog->date }}</td>
                            <td class="border px-4 py-2 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('blogs.show', $blog->id) }}" class="inline-flex justify-center items-center bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    View
                                </a>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="inline-flex justify-center items-center bg-yellow-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    Edit
                                </a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex justify-center items-center bg-red-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
