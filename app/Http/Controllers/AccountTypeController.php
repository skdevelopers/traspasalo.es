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
            if (is_string($accountType->descriptions)) {
                $accountType->descriptions = json_decode($accountType->descriptions, true);
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
        // try {
        $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric',
            'yearly_price' => 'required|numeric',
            'descriptions' => 'required|array',
        ]);

        $data = $request->all();
        $data['descriptions'] = json_encode($request->descriptions);

        AccountType::create($data);

        return redirect()->route('account-types.index')->with('success', 'Account type created successfully.');
        // } catch (\Exception $e) {
        //   return redirect()->back()->withErrors(['error' => 'An error occurred while creating the account type. Please try again.']);
        // }
    }

    public function update(Request $request, AccountType $accountType)
    {
        //dd($request->all());
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'monthly_price' => 'required|numeric',
                'yearly_price' => 'required|numeric',
                'descriptions' => 'required|array',
            ]);
            //dd("hello");

            $data = $request->all();

            $data['descriptions'] = json_encode($request->descriptions);

            $accountType->update($data);

            return redirect()->route('account-types.index', 'Account type updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the account type. Please try again.']);
        }
    }


    // Display the specified resource.
    public function show(AccountType $accountType)
    {
        return view('account-type.show', compact('accountType'));
    }

    // Show the form for editing the specified resource.
    public function edit(AccountType $accountType)
    {
        return view('account-type.edit', compact('accountType'));
    }

    // Update the specified resource in storage.

    // Remove the specified resource from storage.
    public function destroy(AccountType $accountType)
    {
        $accountType->delete();

        return redirect()->route('account-types.index', 'Account type deleted successfully.');
    }
}
