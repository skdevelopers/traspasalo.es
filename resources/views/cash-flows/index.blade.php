@extends('layouts.vertical', ['title' => 'Cash Flows', 'sub_title' => 'Cash Flows'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4">
            <a href="{{ route('cash-flows.create') }}"
               class="btn inline-flex justify-center items-center bg-primary text-white w-full ">
                <i class="mgc_add_line text-lg me-2"></i> Create New
            </a>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Table to display cash flow records -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Cash Receipts</th>
                        <th class="px-4 py-2">Cash Disbursements</th>
                        <th class="px-4 py-2">Customer ID</th>
                        <th class="px-4 py-2">Supplier ID</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="cashFlowTableBody">
                    <!-- Cash Flow rows will be populated here by JavaScript -->
                    </tbody>
                </table>
                <div id="noCashFlowsMessage" class="mt-4 text-center text-gray-500">
                    <!-- Message displayed when no cash flows are available -->
                    No cash flows found. <a href="{{ route('cash-flows.create') }}"
                                            class="text-blue-500 hover:underline">Create one</a>.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            axios.get('/api/cash-flows')
                .then(response => {
                    const cashFlows = response.data;
                    const cashFlowTableBody = document.getElementById('cashFlowTableBody');
                    const noCashFlowsMessage = document.getElementById('noCashFlowsMessage');

                    // Clear existing rows
                    cashFlowTableBody.innerHTML = '';

                    if (cashFlows.length > 0) {
                        // Append new rows with cash flow data
                        cashFlows.forEach(cashFlow => {
                            const row = `
                                <tr>
                                    <td class="border px-4 py-2">${cashFlow.id}</td>
                                    <td class="border px-4 py-2">${cashFlow.cash_receipts}</td>
                                    <td class="border px-4 py-2">${cashFlow.cash_disbursements}</td>
                                    <td class="border px-4 py-2">${cashFlow.customer_id}</td>
                                    <td class="border px-4 py-2">${cashFlow.supplier_id}</td>
                                    <td class="border px-4 py-2 whitespace-nowrap">
                                        <a href="/cash-flows/${cashFlow.id}/edit" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                            <i class="mgc_edit_line text-lg"></i>
                                        </a>
                                        <form action="/cash-flows/${cashFlow.id}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5" onclick="return confirm('Are you sure you want to delete this cash flow?')">
                                                <i class="mgc_delete_line text-xl"></i>
                                            </button>
                                        </form>
                                        <a href="/cash-flows/${cashFlow.id}" class="text-green-500 hover:text-green-700 mx-0.5">
                                            <i class="mgc_display_line text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;

                            // Insert the row into the table body
                            cashFlowTableBody.insertAdjacentHTML('beforeend', row);
                        });

                        // Show table if cash flows exist
                        cashFlowTableBody.style.display = 'table-row-group';
                        noCashFlowsMessage.style.display = 'none';
                    } else {
                        // Show message and create button if no cash flows
                        cashFlowTableBody.style.display = 'none';
                        noCashFlowsMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error fetching cash flows:', error);
                });
        });
    </script>
@endpush
