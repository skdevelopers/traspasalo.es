@extends('layouts.vertical', ['title' => 'Edit User', 'sub_title' => 'User Management'])

@section('content')
    <div>
        <h1>Edit User</h1>
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            
            @include('users._form')
            
            <button type="submit" class="btn bg-primary text-white">Update User</button>
        </form>
    </div>
@endsection
