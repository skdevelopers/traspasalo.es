@extends('layouts.vertical', ['title' => 'Business', 'sub_title' => 'Busienss'])

@section('content')
<div class="container">
    <h1>Businesses</h1>
    <a href="{{ route('business.create') }}" class="btn btn-primary mb-3">Add Business</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Age Restriction</th>
                <th>Pets Permission</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businesses as $business)
                <tr>
                    <td>{{ $business->id }}</td>
                    <td>{{ $business->business_title }}</td>
                    <td>{{ $business->category->name }}</td>
                    <td>{{ Str::limit($business->description, 50) }}</td>
                    <td>{{ $business->age_restriction }}</td>
                    <td>{{ $business->pets_permission }}</td>
                    <td>{{ $business->location }}</td>
                    <td>
                        {{-- <a href="{{ route('businesses.show', $business) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('businesses.edit', $business) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('businesses.destroy', $business) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
