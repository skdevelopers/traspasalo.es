<!-- resources/views/account-types/edit.blade.php -->
@extends('layouts.vertical', ['title' => 'Display packages', 'sub_title' => 'Package'])

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Packages</h1>
    <form action="{{ route('account-types.update', $accountType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full mt-1 p-2 border border-gray-300 rounded" value="{{ $accountType->name }}" required>
        </div>
        <div class="mb-4">
            <label for="monthly_price" class="block text-gray-700">Monthly Price</label>
            <input type="number" name="monthly_price" class="w-full mt-1 p-2 border border-gray-300 rounded" value="{{ $accountType->monthly_price }}" required>
        </div>
        <div class="mb-4">
            <label for="yearly_price" class="block text-gray-700">Yearly Price</label>
            <input type="number" name="yearly_price" class="w-full mt-1 p-2 border border-gray-300 rounded" value="{{ $accountType->yearly_price }}" required>
        </div>
        <div class="mb-4">
            <label for="descriptions" class="block text-gray-700">Descriptions</label>
            <div id="descriptionFields" class="space-y-2">
                @foreach(($accountType->descriptions) as $description)
                    <div class="description-field flex items-center">
                        <input type="text" name="descriptions[]" class="w-full mt-1 p-2 border border-gray-300 rounded" value="{{ $description }}" required>
                        <button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>
                    </div>
                @endforeach
            </div>
            <button type="button" id="addDescription" class="mt-2 px-4 py-2 bg-gray-600 text-white rounded">+</button>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('addDescription').addEventListener('click', function () {
        var div = document.createElement('div');
        div.className = 'description-field flex items-center';
        div.innerHTML = '<input type="text" name="descriptions[]" class="w-full mt-1 p-2 border border-gray-300 rounded" required><button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>';
        document.getElementById('descriptionFields').appendChild(div);
    });

    document.getElementById('descriptionFields').addEventListener('click', function (e) {
        if (e.target && e.target.matches("button.removeDescription")) {
            e.target.parentNode.remove();
        }
    });
</script>
@endpush
