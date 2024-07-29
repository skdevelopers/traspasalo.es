<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Account Types', 'sub_title' => 'Account'])

@section('content')
<div class="container">
    <h1>Account Types</h1>
    <a href="{{ route('account-types.create') }}" class="btn btn-primary">Create Account Type</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Monthly Price</th>
                <th>Yearly Price</th>
                <th>Descriptions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountTypes as $accountType)
            <tr>
                <td>{{ $accountType->name }}</td>
                <td>{{ $accountType->monthly_price }}</td>
                <td>{{ $accountType->yearly_price }}</td>
                <td>
                    <ul>
                        @foreach (($accountType->descriptions) as $description)
                        <li>{{ $description }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('account-types.show', $accountType->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('account-types.edit', $accountType->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('account-types.destroy', $accountType->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
