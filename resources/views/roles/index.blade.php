@extends('layouts.vertical', ['title' => 'Roles', 'sub_title' => 'Roles'])

@section('content')
    <div class="mb-4">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create New Role</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                {{ $permission->name }}<br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                {{ $permission->description }}<br/>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
