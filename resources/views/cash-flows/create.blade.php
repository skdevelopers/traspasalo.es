@extends('layouts.vertical', ['title' => 'Create Cash Flow', 'sub_title' => 'Cash Flows'])

@section('content')
    <div>
        <h1>Create Cash Flow</h1>
        <form method="post" class="valid-form grid lg:grid-cols-3 gap-6" action="{{ route('cash-flows.store') }}">
            @csrf
            @include('cash-flows._form')

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Create Cash Flow</button>
            </div>
        </form>
    </div>
@endsection
