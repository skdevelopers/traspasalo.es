<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Edit Category', 'sub_title' => 'Category'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @include('categories._form', ['category' => $category])
            <div class="col-span-12">
                <button type="submit" class="w-full inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="mgc_save_line text-lg me-2"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
