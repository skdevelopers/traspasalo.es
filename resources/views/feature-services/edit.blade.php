<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Services', 'sub_title' => 'Features'])

@section('content')
<div class="container">
    <h1>Edit Feature Service</h1>

    <form action="{{ route('feature-services.update', $featureService) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $featureService->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
