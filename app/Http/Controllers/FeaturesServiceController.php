<?php

namespace App\Http\Controllers;

use App\Models\FeaturesService;
use Illuminate\Http\Request;

class FeaturesServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuresServices = FeaturesService::all();
        return view('features-services.index', compact('featuresServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features-services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FeaturesService::create($request->all());

        return redirect()->route('features-services.index')->with('success', 'Feature Service added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturesService  $featuresService
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturesService $featuresService)
    {
        return view('features-services.show', compact('featuresService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturesService  $featuresService
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturesService $featuresService)
    {
        return view('features-services.edit', compact('featuresService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturesService  $featuresService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturesService $featuresService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $featuresService->update($request->all());

        return redirect()->route('features-services.index')->with('success', 'Feature Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturesService  $featuresService
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturesService $featuresService)
    {
        $featuresService->delete();

        return redirect()->route('features-services.index')->with('success', 'Feature Service deleted successfully.');
    }
}
