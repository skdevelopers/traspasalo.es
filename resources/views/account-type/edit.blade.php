@extends('layouts.vertical', ['title' => 'Display Account Types', 'sub_title' => 'Account'])

@section('content')
<div class="container">
    <h1>Edit Account Type</h1>
    <form action="{{ route('account-types.update', $accountType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $accountType->name }}" required>
        </div>
        <div class="form-group">
            <label for="monthly_price">Monthly Price</label>
            <input type="number" name="monthly_price" class="form-control" value="{{ $accountType->monthly_price }}" required>
        </div>
        <div class="form-group">
            <label for="yearly_price">Yearly Price</label>
            <input type="number" name="yearly_price" class="form-control" value="{{ $accountType->yearly_price }}" required>
        </div>
        <div class="form-group">
            <label for="descriptions">Descriptions</label>
            <div id="descriptionFields">
                @foreach(($accountType->descriptions) as $description)
                    <div class="description-field">
                        <input type="text" name="descriptions[]" class="form-control mb-2" value="{{ $description }}" required>
                    </div>
                @endforeach
            </div>
            <button type="button" id="addDescription" class="btn btn-secondary">+</button>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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