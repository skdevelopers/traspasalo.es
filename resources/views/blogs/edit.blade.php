<!-- resources/views/blogs/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Blog', 'sub_title' => 'Blogs'])


@section('css')
    @vite([
        'node_modules/quill/dist/quill.core.css', 
        'node_modules/quill/dist/quill.bubble.css',
        'node_modules/quill/dist/quill.snow.css'])
@endsection

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Blog</h2>
        <form id="form-blog"  name="form" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title:</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ $blog->title }}" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description:</label>

                <div id="snow-editor" style="height: 300px;"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <input type="hidden" name="description" id="description" value="{{ old('description', $blog->description) }}">

                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date:</label>
                <input type="date" name="date" id="date"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ $blog->date }}" required>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image:</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}"
                    class="mt-4 rounded-md w-full">
            </div>
            <div>
                <button type="submit"
                    class="w-full inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Blog
                </button>
            </div>
        </form>
    </div>
@endsection


@section('script')
    @vite(['resources/js/pages/highlight.js', 'resources/js/pages/form-editor.js'])
@endsection

