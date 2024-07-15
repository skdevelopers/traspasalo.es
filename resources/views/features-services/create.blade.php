<!-- resources/views/categories/create.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

@section('content')
    <div class="container">
        <h1>Create Features Service</h1>
        <form action="{{ route('features-services.store') }}" method="POST">
            @csrf
            @include('features-services._form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
