<?php


namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use App\Models\Category;
use App\Models\FeatureService;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::all();
        return view('business.index', compact('businesses'));
    }

    public function create()
    {
        $categories = Category::all();
        $features = FeatureService::all();
        return view('front.add-business', compact('categories', 'features'));
    }

    public function store(BusinessRequest $request)
    {
       // die($request);
        $business = Business::create($request->validated());

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $business->addMedia($image)->toMediaCollection('imagesss');

            }
        }

        if ($request->has('features')) {
            $business->features()->sync($request->features);
        }

        return redirect()->route('business.index')->with('success', 'Business created successfully.');
    }

    public function show(Business $business)
    {
        return view('businesses.show', compact('business'));
    }

    public function edit(Business $business)
    {
        $categories = Category::all();
        $features = FeatureService::all();
        return view('businesses.edit', compact('business', 'categories', 'features'));
    }

    public function update(BusinessRequest $request, Business $business)
    {
        $business->update($request->validated());

        if ($request->has('images')) {
            $business->clearMediaCollection('images');
            foreach ($request->file('images') as $image) {
                $business->addMedia($image)->toMediaCollection('images');
            }
        }

        if ($request->has('features')) {
            $business->features()->sync($request->features);
        }

        return redirect()->route('businesses.index')->with('success', 'Business updated successfully.');
    }

    public function destroy(Business $business)
    {
        $business->features()->detach();
        $business->delete();
        return redirect()->route('businesses.index')->with('success', 'Business deleted successfully.');
    }
}
