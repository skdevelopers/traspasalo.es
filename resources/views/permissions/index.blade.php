@extends('layouts.vertical', ['title' => 'Permissions', 'sub_title' => 'Permissions'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4">
            <a href="{{ route('permissions.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New
            </a>
        </div>
    </div>
    <div class="col-span-12">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-md shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Name</th>
                        {{-- <th class="px-4 py-2">Description</th> --}}
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="border px-4 py-2">{{ $permission->id }}</td>
                            <td class="border px-4 py-2">{{ $permission->name }}</td>
                            {{-- <td class="border px-4 py-2">{{ $permission->description }}</td> --}}
                            <td class="border px-4 py-2 whitespace-nowrap">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5">
                                        <i class="mgc_delete_line text-xl"></i>
                                    </button>
                                </form>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="text-green-500 hover:text-green-700 mx-0.5">
                                    <i class="mgc_display_line text-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
