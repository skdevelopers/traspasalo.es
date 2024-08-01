<!-- resources/views/categories/create.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Category', 'sub_title' => 'Category'])

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
