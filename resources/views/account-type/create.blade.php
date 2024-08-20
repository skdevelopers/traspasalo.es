<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Package', 'sub_title' => 'Package'])

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Package</h1>
    <form action="{{ route('account-types.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="monthly_price" class="block text-gray-700">Monthly Price</label>
            <input type="number" name="monthly_price" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="yearly_price" class="block text-gray-700">Yearly Price</label>
            <input type="number" name="yearly_price" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
        </div>

        <!-- Monthly Descriptions -->
        <div class="mb-4">
            <label for="monthly_description" class="block text-gray-700">Monthly Descriptions</label>
            <div id="monthlyDescriptionFields" class="space-y-2">
                <div class="description-field flex items-center">
                    <input type="text" name="monthly_description[]" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    <button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>
                </div>
            </div>
            <button type="button" id="addMonthlyDescription" class="mt-2 px-4 py-2 bg-gray-600 text-white rounded">+</button>
        </div>

        <!-- Yearly Descriptions -->
        <div class="mb-4">
            <label for="yearly_description" class="block text-gray-700">Yearly Descriptions</label>
            <div id="yearlyDescriptionFields" class="space-y-2">
                <div class="description-field flex items-center">
                    <input type="text" name="yearly_description[]" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                    <button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>
                </div>
            </div>
            <button type="button" id="addYearlyDescription" class="mt-2 px-4 py-2 bg-gray-600 text-white rounded">+</button>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
    </form>
</div>

@endsection

@push('scripts')
<script>
    // Monthly Descriptions
    document.getElementById('addMonthlyDescription').addEventListener('click', function () {
        var div = document.createElement('div');
        div.className = 'description-field flex items-center';
        div.innerHTML = '<input type="text" name="monthly_description[]" class="w-full mt-1 p-2 border border-gray-300 rounded" required><button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>';
        document.getElementById('monthlyDescriptionFields').appendChild(div);
    });

    // Yearly Descriptions
    document.getElementById('addYearlyDescription').addEventListener('click', function () {
        var div = document.createElement('div');
        div.className = 'description-field flex items-center';
        div.innerHTML = '<input type="text" name="yearly_description[]" class="w-full mt-1 p-2 border border-gray-300 rounded" required><button type="button" class="removeDescription ml-2 px-2 py-1 bg-red-600 text-white rounded">-</button>';
        document.getElementById('yearlyDescriptionFields').appendChild(div);
    });

    // Remove Description Fields
    document.querySelectorAll('#monthlyDescriptionFields, #yearlyDescriptionFields').forEach(function (container) {
        container.addEventListener('click', function (e) {
            if (e.target && e.target.matches("button.removeDescription")) {
                e.target.parentNode.remove();
            }
        });
    });
</script>
@endpush
