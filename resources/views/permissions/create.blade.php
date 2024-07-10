@extends('layouts.vertical', ['title' => 'Create Permission','sub_title' => 'Permissions', , 'permissions' => $permissions])

@section('content')
    <div>
        <h1>Create Permission</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('permissions.store') }}">
            @csrf

            @include('permissions._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Create Permission</button>
            </div>
        </form>
    </div>
@endsection