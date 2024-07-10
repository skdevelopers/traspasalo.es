@extends('layouts.vertical', ['title' => 'Show Role'])

@section('content')
    <div>
        <h1>Show Role</h1>
        <p><strong>Name:</strong> {{ $role->name }}</p>
        <p><strong>Description:</strong> {{ $role->description }}</p>
        <!-- Add more details if needed -->
    </div>
@endsection
