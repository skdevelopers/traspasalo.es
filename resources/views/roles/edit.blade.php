@extends('layouts.vertical', ['title' => 'Edit Role', 'sub_title' => 'Roles'])

@section('content')
    <div>
        <h1>Edit Role</h1>
        <form method="post" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            @include('roles._form')
            <button type="submit" class="btn btn-success">Update Role</button>
        </form>
    </div>
@endsection
