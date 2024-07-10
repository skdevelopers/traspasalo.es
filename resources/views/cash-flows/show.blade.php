@extends('layouts.vertical', ['title' => 'Cash Flow Details', 'sub_title' => 'Cash Flows'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <h1 class="text-2xl font-semibold">Cash Flow Details</h1>
            <div class="mt-4">
                <p><strong>ID:</strong> {{ $cashFlow->id }}</p>
                <p><strong>Cash Receipts:</strong> {{ $cashFlow->cash_receipts }}</p>
                <p><strong>Cash Disbursements:</strong> {{ $cashFlow->cash_disbursements }}</p>
                <p><strong>Customer ID:</strong> {{ $cashFlow->customer_id }}</p>
                <p><strong>Supplier ID:</strong> {{ $cashFlow->supplier_id }}</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
@endsection
