<!-- resources/views/blogs/show.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Blog', 'sub_title' => 'Blogs'])

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-5">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $blog->title }}</h2>
        <p class="text-sm text-gray-500 mb-6">{{ $blog->date }}</p>
        <div class="mb-6">
            <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}" class="w-full rounded-md shadow-sm">
        </div>
        <div class="prose max-w-none">
            {!! $blog->description !!}
        </div>
        <a href="{{ route('blogs.index') }}" class="inline-flex justify-center items-center bg-gray-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mt-6">
            Back to Blogs
        </a>
    </div>
@endsection
