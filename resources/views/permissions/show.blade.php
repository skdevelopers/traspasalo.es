@extends('layouts.vertical', ['title' => 'Show Permission'])

@section('content')
    <div>
        <h1>Show Permission</h1>
        <p><strong>Name:</strong> {{ $permission->name }}</p>
        <p><strong>Description:</strong> {{ $permission->description }}</p>
        <!-- Add more details if needed -->
    </div>
@endsection
