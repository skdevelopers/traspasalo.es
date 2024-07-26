<!-- resources/views/users/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Users', 'sub_title' => 'User Management'])

@section('content')
   
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Table to display categories -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">First Name</th>
                            <th class="px-4 py-2">Last Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->first_name }}</td>
                                <td class="border px-4 py-2">{{ $user->last_name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                @if($user->roles->isEmpty())
                                    <td class="border px-4 py-2"> No Role Assigned </td>
                                @else
                                    @foreach($user->roles as $roles)
                                    <td class="border px-4 py-2">{{ $roles->name ?? 'No Role Assigned' }}</td>
                                    @endforeach
                                @endif
                                
                                
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                        <i class="mgc_edit_line text-lg"></i>
                                    </a>
                                    {{-- <a href="{{ route('users.edit', $user->id) }}"
                                        class="text-blue-500 hover:text-blue-700 mx-0.5">
                                        <i class="mgc_edit_line text-lg"></i>
                                    </a>--}}
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5"
                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="mgc_delete_line text-xl"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                        
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-gray-500">
                                    No Users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
