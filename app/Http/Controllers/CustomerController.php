<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        // Retrieve all customers
        $customers = Customer::all();
        // Return customers data as JSON response
        return view('customers.index', compact('customers'));
    }
    /**
     * Display a listing of the resource.
     */
    public function indexJson(): JsonResponse
{
    // Retrieve all customers and map to include image URL
    $customers = Customer::all()->map(function ($customer) {
        return [
            'id' => $customer->id,
            'name' => $customer->name,
            'email' => $customer->email,
            'phone' => $customer->phone,
            'job_position' => $customer->job_position,
            'description' => $customer->description,
            'image_url' => $customer->getFirstMediaUrl('customers'), // Assuming 'customers' is the media collection name
        ];
    });

    // Return customers data as JSON response
    return response()->json($customers);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'job_position' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        //dd($request->hasFile('image'));
        // Create the customer with all the request data including the description
        $customer = Customer::create($request->only(['name', 'email', 'phone', 'job_position', 'description']));
    
        // If there's an image, add it to the media library
        if ($request->hasFile('image')) {
            
            $customer->addMedia($request->file('image'))->toMediaCollection('customers');
        }
    
        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers,email,' . $customer->id,
        'phone' => 'required',
        'job_position' => 'required',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
    ]);

    // Update the customer with all the request data including the description
    $customer->update($request->only(['name', 'email', 'phone', 'job_position', 'description']));

    // If there's a new image, update it in the media library
    if ($request->hasFile('image')) {
        // Optional: Remove the previous image before adding the new one
        $customer->clearMediaCollection('customers');
        $customer->addMedia($request->file('image'))->toMediaCollection('customers');
    }

    return redirect()->route('customers.index')
        ->with('success', 'Customer updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // First, clear the media collection to delete the associated images
        $customer->clearMediaCollection('customers');
    
        // Then, delete the customer record from the database
        $customer->delete();
    
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }
    
}
