<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Services', 'sub_title' => 'Features'])

@section('content')
    <div class="container">
        <h1>Edit Features Service</h1>
        <form action="{{ route('features-services.update', $featuresService->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Feature Name:</label>
            <input type="text" id="name" name="name" value="{{ $featuresService->name }}" required>
            <button type="submit">Update Feature</button>
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
