<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Features Services', 'sub_title' => 'Features'])

@section('content')
<div class="container">
    <h1>Feature Services</h1>
    <a href="{{ route('feature-services.create') }}" class="btn btn-primary mb-3">Add Feature Service</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($featureServices as $featureService)
                <tr>
                    <td>{{ $featureService->id }}</td>
                    <td>{{ $featureService->name }}</td>
                    <td>
                        <a href="{{ route('feature-services.edit', $featureService) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('feature-services.destroy', $featureService) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
