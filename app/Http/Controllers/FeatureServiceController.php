<?php
namespace App\Http\Controllers;

use App\Http\Requests\FeatureServiceRequest;
use App\Models\FeatureService;
use Illuminate\Http\Request;

class FeatureServiceController extends Controller
{
    public function index()
    {
        $featureServices = FeatureService::all();
        return view('feature-services.index', compact('featureServices'));
    }

    public function create()
    {
        return view('feature-services.create');
    }

    public function store(FeatureServiceRequest $request)
    {
        FeatureService::create($request->validated());

        return redirect()->route('feature-services.index')->with('success', 'Feature Service created successfully.');
    }

    public function show(FeatureService $featureService)
    {
        return view('feature-services.show', compact('featureService'));
    }

    public function edit(FeatureService $featureService)
    {
        return view('feature-services.edit', compact('featureService'));
    }

    public function update(FeatureServiceRequest $request, FeatureService $featureService)
    {
        $featureService->update($request->validated());

        return redirect()->route('feature-services.index')->with('success', 'Feature Service updated successfully.');
    }

    public function destroy(FeatureService $featureService)
    {
        $featureService->delete();
        return redirect()->route('feature-services.index')->with('success', 'Feature Service deleted successfully.');
    }
}
