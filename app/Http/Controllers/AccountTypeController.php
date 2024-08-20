<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $accountTypes = AccountType::all();
        foreach ($accountTypes as $accountType) {
            // Decode JSON strings to arrays for monthly and yearly descriptions
            if (is_string($accountType->monthly_description)) {
                $accountType->monthly_description = json_decode($accountType->monthly_description, true);
            }
            if (is_string($accountType->yearly_description)) {
                $accountType->yearly_description = json_decode($accountType->yearly_description, true);
            }
        }
        return view('account-type.index', compact('accountTypes'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('account-type.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric',
            'yearly_price' => 'required|numeric',
            'monthly_description' => 'required|array',
            'yearly_description' => 'required|array',
        ]);

        $data = $request->all();
        // Encode descriptions as JSON strings
        $data['monthly_description'] = json_encode($request->monthly_description);
        $data['yearly_description'] = json_encode($request->yearly_description);

        AccountType::create($data);

        return redirect()->route('account-types.index')->with('success', 'Account type created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(AccountType $accountType)
    {
        // Decode JSON strings to arrays for monthly and yearly descriptions
        if (is_string($accountType->monthly_description)) {
            $accountType->monthly_description = json_decode($accountType->monthly_description, true);
        }
        if (is_string($accountType->yearly_description)) {
            $accountType->yearly_description = json_decode($accountType->yearly_description, true);
        }

        return view('account-type.edit', compact('accountType'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, AccountType $accountType)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'monthly_price' => 'required|numeric',
                'yearly_price' => 'required|numeric',
                'monthly_description' => 'required|array',
                'yearly_description' => 'required|array',
            ]);

            $data = $request->all();
            // Encode descriptions as JSON strings
            $data['monthly_description'] = json_encode($request->monthly_description);
            $data['yearly_description'] = json_encode($request->yearly_description);

            $accountType->update($data);

            return redirect()->route('account-types.index')->with('success', 'Account type updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the account type. Please try again.']);
        }
    }

    // Display the specified resource.
    public function show(AccountType $accountType)
    {
        return view('account-type.show', compact('accountType'));
    }

    // Remove the specified resource from storage.
    public function destroy(AccountType $accountType)
    {
        $accountType->delete();

        return redirect()->route('account-types.index')->with('success', 'Account type deleted successfully.');
    }

    public function getPackage(Request $request)
    {
        $billingCycle = $request->input('billing_cycle', 'monthly'); // Default to 'monthly'
    
        // Fetch packages with the relevant price
        $packages = AccountType::whereNotNull("{$billingCycle}_price")->get();
    
        // If the request is AJAX, return a JSON response
        if ($request->ajax()) {
            return response()->json([
                'billingCycle' => $billingCycle,
                'packages' => $packages->map(function($package) {
                    return [
                        'name' => $package->name,
                        'monthly_price' => $package->monthly_price,
                        'yearly_price' => $package->yearly_price,
                        'monthly_description' => json_decode($package->monthly_description, true),
                        'yearly_description' => json_decode($package->yearly_description, true),
                    ];
                })
            ]);
        }
    
        // Otherwise, return the full view
        return view('front.price', compact('packages', 'billingCycle'));
    }
    
    
    
}
