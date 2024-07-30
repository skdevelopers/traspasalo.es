@extends('layouts.vertical', ['title' => 'Edit User', 'sub_title' => 'User Management'])

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            
            @include('users._form')
            
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Update User</button>
        </form>
    </div>
@endsection
