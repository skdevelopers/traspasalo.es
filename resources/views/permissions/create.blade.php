@extends('layouts.vertical', ['title' => 'Create Permission', 'sub_title' => 'Permissions'])

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Permission</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('permissions.store') }}">
            @csrf
            @include('permissions._form')
            <div class="col-span-3">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Create Permission</button>
            </div>
        </form>
    </div>
@endsection
