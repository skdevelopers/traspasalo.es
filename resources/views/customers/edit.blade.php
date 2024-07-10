@extends('layouts.vertical', ['title' => 'Edit Customer', 'sub_title' => 'Customers'])

@section('content')
    <div>
        <h1>Edit Customer</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')

            @include('customers._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Update Customer</button>
            </div>
        </form>
    </div>
@endsection
