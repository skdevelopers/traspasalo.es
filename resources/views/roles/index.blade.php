<!-- resources/views/roles/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Roles', 'sub_title' => 'Role'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4 col-span-12">
                <a href="{{ route('roles.create')}}"
                   class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                    <i class="mgc_add_line text-lg me-2"></i> Create New Role
                </a>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Table to display categories -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Permissions</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td class="border px-4 py-2">{{ $role->id }}</td>
                            <td class="border px-4 py-2">{{ $role->name }}</td>
                            <td class="border px-4 py-2">
                                @foreach ($role->permissions as $permission)
                                    {{ $permission->name }}<br/>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                                
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="text-blue-500 hover:text-blue-700 mx-0.5">
                                        <i class="mgc_edit_line text-lg"></i>
                                    </a>
                                
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5"
                                                onclick="return confirm('Are you sure you want to delete this Role?')">
                                            <i class="mgc_delete_line text-xl"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500">
                                No Roles found.  <a href="{{ route('roles.create')}}"
                                                                        class="text-blue-500 hover:underline">Create one</a>. 
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
