<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CashFlow;
use App\Traits\GeneralLedgerTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    use GeneralLedgerTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all cash flows with associated customer and supplier details
        $cashFlows = CashFlow::with('customer', 'supplier')->get();

        // Return the index view with cash flows data
        return view('cash-flows.index', compact('cashFlows'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexJson(): JsonResponse
    {
        // Retrieve all customers
        $cashFlow = CashFlow::all();
        // Return customers data as JSON response
        return response()->json($cashFlow);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create view for cash flow creation
        return view('cash-flows.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request)
    {
        $validatedData = $this->getArr($request);

        $cashFlow = CashFlow::create($validatedData);

        $cashReceiptsAccount = Account::where('name', 'Cash at Bank')->first()->id;
        $cashDisbursementsAccount = Account::where('name', 'Cash in Hand')->first()->id;

        $details = [];

        if ($cashFlow->cash_receipts > 0) {
            $details[] = [
                'entryable_id' => $cashFlow->id,
                'entryable_type' => CashFlow::class,
                'account_id' => $cashReceiptsAccount,
                'type' => 'debit',
                'total_amount' => $cashFlow->cash_receipts,
            ];
        }

        if ($cashFlow->cash_disbursements > 0) {
            $details[] = [
                'entryable_id' => $cashFlow->id,
                'entryable_type' => CashFlow::class,
                'account_id' => $cashDisbursementsAccount,
                'type' => 'credit',
                'total_amount' => $cashFlow->cash_disbursements,
            ];
        }

        $user = auth()->user();
        $this->generateGL('Cash Flow Transaction', $details, 'Cash Flow Reference', 'cash_flow', $user);

        return redirect()->route('cash-flows.index')->with('success', 'Cash Flow created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CashFlow $cashFlow)
    {
        // Load related customer and supplier data
        $cashFlow->load('customer', 'supplier');

        // Return the show view with cash flow details
        return view('cash-flows.show', compact('cashFlow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashFlow $cashFlow)
    {
        // Return the edit view with the specified cash flow data
        return view('cash-flows.edit', compact('cashFlow'));
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, CashFlow $cashFlow)
    {
        $validatedData = $this->getArr($request);

        $cashFlow->update($validatedData);

        $cashReceiptsAccount = Account::where('name', 'Cash at Bank')->first()->id;
        $cashDisbursementsAccount = Account::where('name', 'Cash in Hand')->first()->id;

        $details = [
            [
                'entryable_id' => $cashFlow->id,
                'entryable_type' => CashFlow::class,
                'account_id' => $cashReceiptsAccount,
                'type' => 'debit',
                'total_amount' => $cashFlow->cash_receipts,
            ],
            [
                'entryable_id' => $cashFlow->id,
                'entryable_type' => CashFlow::class,
                'account_id' => $cashDisbursementsAccount,
                'type' => 'credit',
                'total_amount' => $cashFlow->cash_disbursements,
            ],
        ];

        $user = auth()->user();
        $this->generateGL('Cash Flow Update', $details, 'Cash Flow Update Reference', 'cash_flow', $user);

        return redirect()->route('cash-flows.show', $cashFlow->id)->with('success', 'Cash Flow updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashFlow $cashFlow)
    {
        // Delete the cash flow record
        $cashFlow->delete();

        // Redirect to the index route with success message
        return redirect()->route('cash-flows.index')->with('success', 'Cash Flow deleted successfully.');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getArr(Request $request): array
    {
        $validatedData = $request->validate([
            'dated' => 'required|date',
            'customer_id' => 'required_if:cash_receipts,>,0|nullable|exists:customers,id',
            'supplier_id' => 'required_if:cash_disbursements,>,0|nullable|exists:suppliers,id',
            'sale_id' => 'nullable|exists:sales,id',
            'purchase_id' => 'nullable|exists:purchases,id',
            'cash_receipts' => 'required_without:cash_disbursements|nullable|numeric|min:0',
            'cash_disbursements' => 'required_without:cash_receipts|nullable|numeric|min:0',
        ], [
            'customer_id.required_if' => 'Customer is required when cash receipts are provided.',
            'supplier_id.required_if' => 'Supplier is required when cash disbursements are provided.',
            'cash_receipts.required_without' => 'Cash receipts are required if cash disbursements are not provided.',
            'cash_disbursements.required_without' => 'Cash disbursements are required if cash receipts are not provided.',
        ]);

        // Set default values to 0 if fields are empty
        $validatedData['cash_receipts'] = $validatedData['cash_receipts'] ?? 0;
        $validatedData['cash_disbursements'] = $validatedData['cash_disbursements'] ?? 0;
        return $validatedData;
    }
}
