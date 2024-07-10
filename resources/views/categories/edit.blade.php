<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Category', 'sub_title' => 'Category'])

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories._form', ['category' => $category])
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
