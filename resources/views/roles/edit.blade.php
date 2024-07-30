@extends('layouts.vertical', ['title' => 'Edit Role', 'sub_title' => 'Roles'])

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Role</h1>
        
            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                @include('roles._form')
                <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Update Role</button>
            </form>
        
    </div>
@endsection
