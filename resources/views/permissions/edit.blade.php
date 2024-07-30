@extends('layouts.vertical', ['title' => 'Edit Permission', 'sub_title' => 'Permissions'])

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Permission</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
            @include('permissions._form')
            <div class="col-span-3">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Update Permission</button>
            </div>
        </form>
    </div>
@endsection
