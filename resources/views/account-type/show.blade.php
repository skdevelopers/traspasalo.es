@extends('layouts.vertical', ['title' => 'Show Account Types', 'sub_title' => 'Account'])

@section('content')
<div class="container">
    <h1>{{ $accountType->name }}</h1>
    <p>Monthly Price: {{ $accountType->monthly_price }}</p>
    <p>Yearly Price: {{ $accountType->yearly_price }}</p>
    <ul>
        @foreach ($accountType->monthly_description as $monthlyDescription)
                    <li>{{ $monthlyDescription }}</li>
         @endforeach
    </ul>
    <ul>
        @foreach ($accountType->yearly_description as $yearlyDescription)
                    <li>{{ $yearlyDescription }}</li>
        @endforeach
    </ul>
    <a href="{{ route('account-types.edit', $accountType->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('account-types.destroy', $accountType->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('account-types.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
