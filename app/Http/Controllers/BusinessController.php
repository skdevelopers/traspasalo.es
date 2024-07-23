<?php


namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use App\Models\Category;
use App\Models\FeatureService;
use Illuminate\Http\Request;
use App\Services\MediaUploadService;
use App\DTO\BusinessDTO;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{
    private MediaUploadService $mediaUploadService;

    public function __construct(MediaUploadService $mediaUploadService)
    {
        $this->mediaUploadService = $mediaUploadService;
    }

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

        $data = $request->validated();

        if (!empty($data['features'])) {
            //Log::info('Original Features:', $data['features']); // Log the original input

            // If features are submitted as a single string, split them into an array
            if (is_string($data['features'][0])) {
                $data['features'] = explode(',', $data['features'][0]);
                //Log::info('Exploded Features:', $data['features']); // Log after explode
            }

            // Ensure the array contains only numeric values
            $data['features'] = array_filter($data['features'], 'is_numeric');
            //Log::info('Filtered Numeric Features:', $data['features']); // Log after filtering

            // Convert feature IDs to integers
            $data['features'] = array_map('intval', $data['features']);
            //Log::info('Integer Features:', $data['features']); // Log the integer conversion
        } else {
            $data['features'] = [];
        }


        $businessDTO = new BusinessDTO(
            null, // Assuming this is a create operation and ID is null
            $data['category_id'],
            $data['business_title'],
            $data['description'],
            $data['check_in'],
            $data['check_out'],
            $data['age_restriction'],
            $data['pets_permission'],
            $data['location'],
            $data['features'] ?? [],
            $request->file('images') ?? []
        );

        $business = Business::create($businessDTO->toArray());

        if (!empty($businessDTO->images)) {
            //dd($businessDTO->images);
            foreach ($businessDTO->images as $image) {
                $result = $this->mediaUploadService->uploadAndAttachMedia($image, $business);
                if (!$result['success']) {
                    return back()->withErrors($result['message']);
                }
            }
        }

        if (!empty($businessDTO->features)) {
            //Log::info('Feature IDs:', $businessDTO->features); // Log for debugging

            $business->features()->sync($businessDTO->features);
        }

        return redirect()->route('business.index')->with('success', 'Business created successfully.');
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

    public function show($id)
    {
        try {
            $business = Business::with(['category', 'features'])->findOrFail($id);
            return response()->json($business);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Business not found'], 404);
        }
    }
}
