@extends('layouts.vertical', ['title' => 'Create Role', 'sub_title' => 'Roles'])

@section('content')
    <div>
        <h1>Create Role</h1>
        <form method="post" action="{{ route('roles.store') }}">
            @csrf
            @include('roles._form')
            <button type="submit" class="btn btn-success">Create Role</button>
        </form>
    </div>
@endsection
