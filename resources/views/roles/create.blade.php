<!-- create.blade.php -->

@extends('layouts.vertical', ['title' => 'Create Role'])

@section('content')
    <div>
        <h1>Create Role</h1>
        <form method="post" action="{{ route('roles.store') }}">
            @csrf

            @include('roles._form')

            <button type="submit">Create Role</button>
        </form>
    </div>
@endsection
