<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('media')->get(); // Only fetch categories with no parent
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::create($request->all());

        // Handle image upload using Spatie Media Library
        if ($request->hasFile('image')) {
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category->update($request->all());

        // Handle image upload using Spatie Media Library
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('images');
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Check if the category has any subcategories
        if ($category->children()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Category cannot be deleted because it has subcategories.');
        }

        // Proceed with the deletion if no subcategories exist
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }


    public function getSubcategories($categoryId)
    {
        $subcategories = Category::where('parent_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function getCategory()
    {
        $categories = Category::whereNull('parent_id')->get();

        // Return categories as JSON
        return response()->json($categories);
    }
}
