<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Account Types', 'sub_title' => 'Account'])

@section('content')
<div class="container">
    <h1>Create Account Type</h1>
    <form action="{{ route('account-types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="monthly_price">Monthly Price</label>
            <input type="number" name="monthly_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="yearly_price">Yearly Price</label>
            <input type="number" name="yearly_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descriptions">Descriptions</label>
            <div id="descriptionFields">
                <div class="description-field">
                    <input type="text" name="descriptions[]" class="form-control mb-2" required>
                </div>
            </div>
            <button type="button" id="addDescription" class="btn btn-secondary">+</button>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
@push('scripts')
<script>
    document.getElementById('addDescription').addEventListener('click', function () {
        var div = document.createElement('div');
        div.className = 'description-field';
        div.innerHTML = '<input type="text" name="descriptions[]" class="form-control mb-2" required>';
        document.getElementById('descriptionFields').appendChild(div);
    });
</script>
@endpush