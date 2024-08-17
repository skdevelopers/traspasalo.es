@extends('layouts.vertical', ['title' => 'Create Client', 'sub_title' => 'Clients'])

@section('content')
    <div>
        <h1>Create Customer</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
            @include('customers._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Create Client</button>
            </div>
        </form>
    </div>
@endsection
