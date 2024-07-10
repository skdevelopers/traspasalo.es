@extends('layouts.vertical', ['title' => 'Create Supplier', 'sub_title' => 'Suppliers'])

@section('content')
    <div>
        <h1>Create Supplier</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('suppliers.store') }}">
            @csrf
            @include('suppliers._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Create Supplier</button>
            </div>
        </form>
    </div>
@endsection
