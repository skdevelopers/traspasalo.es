@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

<div class="container">
    <h1>Feature Service Details</h1>

    <p><strong>ID:</strong> {{ $featureService->id }}</p>
    <p><strong>Name:</strong> {{ $featureService->name }}</p>

    <a href="{{ route('feature-services.edit', $featureService) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('feature-services.destroy', $featureService) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('feature-services.index') }}" class="btn btn-secondary">Back to List</a>
</div>