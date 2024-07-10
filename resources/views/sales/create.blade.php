@extends('layouts.vertical', ['title' => 'add Sale', 'sub_title' => 'Sale', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="valid-form p-6">
        <form action="{{ route('sales.create') }}" method="post">
            @csrf

            <div id="form-container">
                <div class="grid lg:grid-cols-3 gap-6 form-row">
                    <div class="form-group col-span-3">
                        <label for="date" class="text-gray-800 text-sm font-medium inline-block mb-2">Date</label>
                        <input type="date" class="form-input" id="datepicker-basic" name="dates[]" required>
                    </div>
                    <div class="form-group col-span-3">
                        <label for="party_name" class="text-gray-800 text-sm font-medium inline-block mb-2">Party Name</label>
                        <input type="text" class="form-input" name="party_names[]" required>
                    </div>
                    <div class="form-group col-span-3">
                        <label for="product_name" class="text-gray-800 text-sm font-medium inline-block mb-2">Product Name</label>
                        <input type="text" class="form-input" name="product_names[]" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="text-gray-800 text-sm font-medium inline-block mb-2">Quantity</label>
                        <input type="number" class="form-input" name="quantities[]" required>
                    </div>
                    <div class="form-group">
                        <label for="rate" class="text-gray-800 text-sm font-medium inline-block mb-2">Rate/Price</label>
                        <input type="number" class="form-input" name="rates[]" required>
                    </div>
                    <div class="form-group">
                        <label for="percentage" class="text-gray-800 text-sm font-medium inline-block mb-2">Percentage</label>
                        <input type="number" class="form-input" name="percentages[]" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="text-gray-800 text-sm font-medium inline-block mb-2">Amount</label>
                        <input type="number" class="form-input" name="amounts[]" required>
                    </div>
                </div>
            </div>

            <div class="form-group col-span-3">
                <button type="button" class="btn bg-primary text-white" id="add-row">Add Row</button>
            </div>

            <div class="form-group col-span-3">
                <button type="submit" class="btn bg-primary text-white">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function () {
            const formContainer = document.getElementById('form-container');
            const newFormRow = formContainer.firstElementChild.cloneNode(true);
            formContainer.appendChild(newFormRow);
        });
    </script>
@endsection