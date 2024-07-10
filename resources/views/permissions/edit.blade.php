@extends('layouts.vertical', ['title' => 'Edit Permission','sub_title' => 'Permissions',])

@section('content')
    <div>
        <h1>Edit Permission</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')

            @include('permissions._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Update Permission</button>
            </div>
        </form>
    </div>
@endsection