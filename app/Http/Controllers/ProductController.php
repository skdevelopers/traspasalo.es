<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Services\MediaUploadService;
use App\Traits\GeneralLedgerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProductController extends Controller
{
    use GeneralLedgerTrait;

    private MediaUploadService $mediaUploadService;

    public function __construct(MediaUploadService $mediaUploadService)
    {
        $this->mediaUploadService = $mediaUploadService;
    }

    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category', 'subcategory')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource as JSON.
     */
    public function indexJson(): JsonResponse
    {
        // Retrieve all products with category and subcategory eager loaded
        $products = Product::with('category', 'subcategory')->get();
        return response()->json($products);
    }
    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $attributes = Attribute::all(); // Load all attributes
        $modelType = 'App\\Models\\Product'; // Model type for Product
        return view('products.create', compact('categories', 'attributes', 'modelType'));
    }

    /**
     * Store a newly created product in storage.
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'unit' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:categories,id',
            'sub_subcategory_id' => 'nullable|exists:categories,id',
            'images.*' => 'nullable|image|max:2048', // Adjust max size as needed
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Create the product
            $product = Product::create($request->all());

            // Attach images
            if ($request->hasFile('file')) {
                $this->mediaUploadService->uploadAndAttachMedia($request->file('file'), $product);
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with success message
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Flash an error message
            throw ValidationException::withMessages(['images' => 'Failed to upload one or more images. Please try again.']);
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $modelType = 'App\\Models\\Product'; // Model type for Product
        $modelId = $product->id; // Product ID
        return view('products.edit', compact('product','categories', 'modelType', 'modelId'));
    }

    /**
     * Update the specified product in storage.
     * @throws ValidationException
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'unit' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:categories,id',
            'sub_subcategory_id' => 'nullable|exists:categories,id',
            'images.*' => 'nullable|image|max:2048', // Adjust max size as needed
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Update the product
            $product->update($request->all());

            // Attach images
            if ($request->hasFile('file')) {
                $this->mediaUploadService->uploadAndAttachMedia($request->file('file'), $product);
            }

            // Commit the transaction
            DB::commit();

            // Redirect to the index page with success message
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (\Throwable $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Flash an error message
            throw ValidationException::withMessages(['images' => 'Failed to upload one or more images. Please try again.']);
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        // Redirect to the index page with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
