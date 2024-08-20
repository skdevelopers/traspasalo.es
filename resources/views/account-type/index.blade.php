<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Packages', 'sub_title' => 'Packages'])

@section('content')
{{-- @can('create_users') --}}
    <div class="grid grid-cols-12">
        <div class="mb-4 col-span-12">
            <a href="{{ route('account-types.create') }}"
                class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New Package
            </a>
        </div>
    </div>
{{-- @endcan --}}
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Table to display packages -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Monthly Price</th>
                            <th class="px-4 py-2">Yearly Price</th>
                            <th class="px-4 py-2">Monthly Descriptions</th>
                            <th class="px-4 py-2">Yearly Descriptions</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accountTypes as $accountType)
                            <tr>
                                <td class="border px-4 py-2">{{ $accountType->id }}</td>
                                <td class="border px-4 py-2">{{ $accountType->name }}</td>
                                <td class="border px-4 py-2">{{ $accountType->monthly_price }}</td>
                                <td class="border px-4 py-2">{{ $accountType->yearly_price }}</td>
                                <td class="border px-4 py-2">
                                    <ul>
                                        @foreach ($accountType->monthly_description as $monthlyDescription)
                                            <li>{{ $monthlyDescription }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border px-4 py-2">
                                    <ul>
                                        @foreach ($accountType->yearly_description as $yearlyDescription)
                                            <li>{{ $yearlyDescription }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border px-4 py-2 whitespace-nowrap">
                                    @can('edit roles')
                                        <a href="{{ route('account-types.edit', $accountType->id) }}"
                                            class="text-blue-500 hover:text-blue-700 mx-0.5">
                                            <i class="mgc_edit_line text-lg"></i>
                                        </a>
                                    @endcan
                                    @can('delete roles')
                                        <form action="{{ route('account-types.destroy', $accountType->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5"
                                                onclick="return confirm('Are you sure you want to delete this package?')">
                                                <i class="mgc_delete_line text-xl"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500">
                                    No Package found. <a href="{{ route('account-types.create') }}"
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
