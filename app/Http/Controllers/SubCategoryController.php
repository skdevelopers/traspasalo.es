<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the subcategories.
     */
    public function index()
    {
        $subcategories = Category::whereNotNull('parent_id')->with('media', 'parent')->get(); // Only fetch subcategories
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new subcategory.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get(); // Get only parent categories for selection
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created subcategory in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $subcategory = Category::create($request->all());

        // Handle image upload using Spatie Media Library
        if ($request->hasFile('image')) {
            $subcategory->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show the form for editing the specified subcategory.
     */
    public function edit(Category $subcategory)
    {
        $categories = Category::whereNull('parent_id')->get(); // Get all parent categories for selection
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified subcategory in storage.
     */
    public function update(Request $request, Category $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $subcategory->update($request->all());

        // Handle image upload using Spatie Media Library
        if ($request->hasFile('image')) {
            $subcategory->clearMediaCollection('images');
            $subcategory->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy(Category $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
