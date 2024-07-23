

<!-- resources/views/Feature-services/feature.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

@section('content')
    <div class="container">
        <h1>Add Feature Service</h1>
        <form action="{{ route('feature-services.store') }}" method="POST">
            @csrf
            @include('feature-services._form')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection