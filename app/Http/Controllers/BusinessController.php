<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use App\Models\User;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\Category;
use App\Models\FeatureService;
use Illuminate\Http\Request;
use App\Services\MediaUploadService;
use App\DTO\BusinessDTO;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    private MediaUploadService $mediaUploadService;

    public function __construct(MediaUploadService $mediaUploadService)
    {
        $this->mediaUploadService = $mediaUploadService;
    }
    public function allCount()
    {
        $totalBusinesses = Business::count(); // Assuming you have a Business model
        $totalUsers = User::count(); // Assuming you have a User model
        $totalCustomers = Customer::count(); // Assuming you have a Customer model
        $totalBlogs = Blog::count(); // Assuming you have a Blog model

        return view('/index', compact('totalBusinesses', 'totalUsers', 'totalCustomers','totalBlogs'));
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $businesses = Business::with('category', 'subcategory')->paginate(10);
        } else {
            $businesses = Business::where('user_id', auth()->id())
                ->with('category', 'subcategory')
                ->paginate(10);
        }

        return view('business.index', compact('businesses'));
    }

    public function create()
    {
        // $user = auth()->user();

        // // Check if the user has reached their business limit
        // if ($user->businesses()->count() >= $user->business_limit) {
        //     return redirect()->route('price') // Change 'some.route' to the route you want to redirect to
        //         ->with('plan_msg', 'You have reached your business limit. Please upgrade your plan to add more businesses.');
        // }

        $categories = Category::whereNull('parent_id')->select('id', 'name')->get();
        $features = FeatureService::all();
        return view('front.add-business', compact('categories', 'features'));
    }

    public function store(Request $request)
    {
        // Validate the basic business data
        $request->validate([
            'business_title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
        ]);
    
        $request['features'] = $this->processFeatures($request['features']);
        // Use a transaction to ensure atomicity of operations
        DB::transaction(function () use ($request) {
            // Create the business
            $business = Business::create($request->only(['business_title', 'description', 'category_id', 'subcategory_id', 'location']));
    
            // Handle images (Ensure this function is defined properly to handle image uploads)
            $this->handleImages($request->images, $business);
            
           //dd($request->features);
            if (!empty($request->features)) {
                       $business->features()->sync($request->features);
                     }
            
                 $business->generateQrCode();
    
            // Save related data only if necessary
            $this->saveRelatedData($business, $request);
        });

    
        return redirect()->route('business.index')->with('success', 'Business and related data saved successfully');
    }
    
    // Function to handle saving related data
    private function saveRelatedData($business, Request $request)
    {
        // Save or delete facility data
        $facilityData = $request->input('facility') ?? [];
        if ($this->hasAtLeastOneValue($facilityData)) {
            $business->facility()->updateOrCreate(
                ['business_id' => $business->id],
                $facilityData
            );
        } elseif ($business->facility) {
            $business->facility()->delete();
        }
    
        // Save or delete financial data
        $financialData = $request->input('financial') ?? [];
        if ($this->hasAtLeastOneValue($financialData)) {
            $business->financial()->updateOrCreate(
                ['business_id' => $business->id],
                $financialData
            );
        } elseif ($business->financial) {
            $business->financial()->delete();
        }
    
        // Save or delete vehicle data
        $vehicleData = $request->input('vehicle') ?? [];
        if ($this->hasAtLeastOneValue($vehicleData)) {
            $business->vehicle()->updateOrCreate(
                ['business_id' => $business->id],
                $vehicleData
            );
        } elseif ($business->vehicle) {
            $business->vehicle()->delete();
        }
    
        // Save or delete business employee data
        $employeeData = $request->input('business_employee') ?? [];
        if ($this->hasAtLeastOneValue($employeeData)) {
            $business->businessEmployee()->updateOrCreate(
                ['business_id' => $business->id],
                $employeeData
            );
        } elseif ($business->businessEmployee) {
            $business->businessEmployee()->delete();
        }
    
        // Save or delete FfAndE data
        $ffAndEData = $request->input('FfAndE') ?? [];
        if ($this->hasAtLeastOneValue($ffAndEData)) {
            $business->ffAndE()->updateOrCreate(
                ['business_id' => $business->id],
                $ffAndEData
            );
        } elseif ($business->ffAndE) {
            $business->ffAndE()->delete();
        }
    }
    
    
    // Helper function to check if at least one value in the array is provided
    private function hasAtLeastOneValue($input)
    {
        if (!is_array($input)) {
            return false;
        }
    
        // Filter the array to check for any non-empty values
        foreach ($input as $value) {
            if (!is_null($value) && $value !== '') {
                return true;
            }
        }
    
        return false;
    }
    

    // public function store(BusinessRequest $request)
    // {
    //     $data = $request->validated();

    //     $subcategory = Category::find($request->subcategory_id);
    //     if ($subcategory->parent_id != $request->category_id) {
    //         return redirect()->back()->withErrors(['subcategory_id' => 'The selected subcategory does not belong to the selected category.']);
    //     }

    //     $data['features'] = $this->processFeatures($data['features']);
    //     $data['user_id'] = auth()->id();

    //     $businessDTO = new BusinessDTO(
    //         null,
    //         $data['user_id'],
    //         $data['subcategory_id'],
    //         $data['business_title'],
    //         $data['description'],
    //         $data['check_in'],
    //         $data['check_out'],
    //         $data['age_restriction'],
    //         $data['pets_permission'],
    //         $data['location'],
    //         $data['features'] ?? [],
    //         $request->file('images') ?? []
    //     );

    //     $business = Business::create($businessDTO->toArray());

    //     $this->handleImages($businessDTO->images, $business);

    //     if (!empty($businessDTO->features)) {
    //         $business->features()->sync($businessDTO->features);
    //     }

    //     $business->generateQrCode();

    //     return redirect()->route('business.index')->with('success', 'Business created successfully.');
    // }

    // public function edit($id)
    // {
    //     // Retrieve the business with its relationships
    //     $business = Business::with(['category', 'features', 'subcategory', 'user', 'media'])->findOrFail($id);

    //     // Retrieve all categories for the dropdown
    //     $categories = Category::all();

    //     // Retrieve all features for the features section
    //     $features = FeatureService::all();

    //     // Get the IDs of the features already associated with the business
    //     $selectedFeatures = $business->features->pluck('id')->toArray();

    //     // Get the media associated with the business
    //     $media = $business->getMedia('images')->map(function ($item) {
    //         $convertedUrl = $item->getPathRelativeToRoot('resized');

    //         // If the conversion does not exist, use the original URL
    //         if (!$convertedUrl) {
    //             $relativePath = 'storage/images/' . $item->id . '/' . $item->file_name;
    //             $item['org_url'] = url($relativePath);
    //         } else {
    //             $item['org_url'] = asset('storage/images/' . $convertedUrl);
    //         }

    //         return [
    //             'url' => $item['org_url'],
    //             'name' => $item->file_name,
    //         ];
    //     })->toArray();

    //     // Pass the data to the edit view
    //     return view('business.edit', compact('business', 'categories', 'features', 'media', 'selectedFeatures'));
    // }

    public function edit($id)
{
    // Find the business by ID, including related models such as features, facility, financial, etc.
    $business = Business::with(['features', 'facility', 'financial', 'vehicle', 'businessEmployee', 'ffAndE', 'media'])->findOrFail($id);

    // Fetch all categories and subcategories
    $categories = Category::all();
    $subcategories = $business->category ? $business->category->subcategories : [];

    // Fetch all available features
    $features = FeatureService::all();

    // Return the edit view, passing the necessary data
    return view('business.edit', compact('business', 'categories', 'subcategories', 'features'));
}


    // public function update(BusinessRequest $request, $id)
    // {
    //     $business = Business::findOrFail($id);
    //     $data = $request->validated();

    //     // Validate that the selected subcategory belongs to the selected category
    //     $subcategory = Category::find($request->subcategory_id);
    //     if ($subcategory->parent_id != $request->category_id) {
    //         return redirect()->back()->withErrors(['subcategory_id' => 'The selected subcategory does not belong to the selected category.']);
    //     }

    //     // Process features
    //     $data['features'] = $this->processFeatures($data['features'] ?? []);

    //     // Update the business data
    //     $business->update([
    //         'subcategory_id' => $data['subcategory_id'],
    //         'business_title' => $data['business_title'],
    //         'description' => $data['description'],
    //         'check_in' => $data['check_in'],
    //         'check_out' => $data['check_out'],
    //         'age_restriction' => $data['age_restriction'],
    //         'pets_permission' => $data['pets_permission'],
    //         'location' => $data['location'],
    //     ]);

    //     // Handle image updates
    //     if ($request->hasFile('images')) {
    //         $this->handleImages($request->file('images'), $business);
    //     }

    //     // Sync features
    //     if (!empty($data['features'])) {
    //         $business->features()->sync($data['features']);
    //     }

    //     return redirect()->route('business.index')->with('success', 'Business updated successfully.');
    // }

    public function update(Request $request, Business $business)
{
    // Validate the basic business data
    $request->validate([
        'business_title' => 'required|string',
        'description' => 'required|string',
        'location' => 'required|string',
    ]);

    $request['features'] = $this->processFeatures($request['features']);
    
    // Use a transaction to ensure atomicity of operations
    DB::transaction(function () use ($request, $business) {
        // Update the business
        $business->update($request->only(['business_title', 'description', 'category_id', 'subcategory_id', 'location']));

        // Handle images (Ensure this function is defined properly to handle image uploads)
        $this->handleImages($request->images, $business);

        if (!empty($request->features)) {
            // Sync the features
            $business->features()->sync($request->features);
        }

        // Regenerate QR code if necessary
        $business->generateQrCode();

        // Save related data only if necessary
        $this->saveRelatedData($business, $request);
    });

    return redirect()->route('business.index')->with('success', 'Business and related data updated successfully');
}



    // public function destroy($id)
    // {
    //     $business = Business::findOrFail($id);
    //     // $business->media()->detach();
    //     $business->features()->detach();
    //     $business->delete();
    //     return redirect()->route('business.index')->with('success', 'Business deleted successfully.');
    // }
    public function destroy($id)
    {
        // Find the business by ID
        $business = Business::findOrFail($id);
    
        // Start a transaction to ensure data integrity
        DB::transaction(function () use ($business) {
            // If business has images, delete them
            if ($business->media) {
                foreach ($business->media as $media) {
                    // Assuming there's a service or logic to delete media files
                    $this->mediaUploadService->deleteMedia($media);
                }
            }
    
            // Delete the related data if necessary (features, facility, etc.)
            $business->features()->detach();
            $business->facility()->delete();
            $business->financial()->delete();
            $business->vehicle()->delete();
            $business->businessEmployee()->delete();
            $business->ffAndE()->delete();
    
            // Finally, delete the business itself
            $business->delete();
        });
    
        // Redirect to the business index page with a success message
        return redirect()->route('business.index')->with('success', 'Business deleted successfully');
    }
    
    // public function show($id)
    // {
    //     try {
    //         $business = Business::with(['category', 'features', 'subcategory', 'user', 'media'])->findOrFail($id);
    //         return response()->json($business);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Business not found'], 404);
    //     }
    // }
    public function show($id)
    {
        // Find the business by ID, including related models like features, facility, etc.
        $business = Business::with(['features', 'facility', 'financial', 'vehicle', 'businessEmployee', 'ffAndE', 'media'])->findOrFail($id);
    
        // Return the show view, passing the business data to the view
        return view('business.show', compact('business'));
    }
    
    public function getBusiness($id)
    {
        try {
            $business = Business::with(['category', 'features', 'subcategory', 'user', 'media'])->findOrFail($id);

            // Filter media to only include business images
            $media = $business->getMedia('images')->map(function ($item) {

                $convertedUrl = $item->getPathRelativeToRoot('resized');
                //dd($convertedUrl);
                // If there's no conversion, fallback to the original URL
                if (!$convertedUrl) {
                    //  dd("hello");
                    $relativePath = 'storage/images/' . $item->id . '/' . $item->file_name;
                    $item['org_url'] = url($relativePath);
                } else {
                    $item['org_url'] = asset('/storage/images/' . $convertedUrl);
                }

                // Add the URL to the item


                //$relativePath = 'storage/images/' . $item->id . '/' . $item->file_name;

                //$item['org_url'] = url($relativePath);

                return $item->only(['org_url', 'name']);
            })->toArray();
            //dd($media);
            return view('front.add-property', compact('business', 'media'));
        } catch (\Exception $e) {
            return view('front.add-property', ['business' => null]);
        }
    }

    public function getLocations()
    {
        $locations = Business::pluck('id', 'location');
        return response()->json([
            'locations' => $locations,
            'status' => 1,
        ], 200);
    }

    public function showBusinesses(Request $request)
    {
        $query = Business::with(['category', 'subcategory', 'media']);
        $hasFilters = $this->applyFilters($query, $request);

        $businesses = $hasFilters ? $query->get() : Business::with(['category', 'subcategory', 'media'])->get();

        //  dd($businesses);
        return view('business.show', compact('businesses'));
    }

    private function processFeatures($features)
    {
        if (!empty($features)) {
            if (is_string($features[0])) {
                $features = explode(',', $features[0]);
            }
            $features = array_filter($features, 'is_numeric');
            $features = array_map('intval', $features);
        } else {
            $features = [];
        }
        return $features;
    }

    private function handleImages($images, $business)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                $result = $this->mediaUploadService->uploadAndAttachMedia($image, $business);
                if (!$result['success']) {
                    return back()->withErrors($result['message']);
                }
            }
        }
    }


    private function applyFilters($query, Request $request)
    {
        $hasFilters = false;

        if ($request->has('category_id') && !is_null($request->input('category_id'))) {
            $query->where('category_id', $request->input('category_id'));
            $hasFilters = true;
        }

        if ($request->has('subcategory_id') && !is_null($request->input('subcategory_id'))) {
            $query->where('subcategory_id', $request->input('subcategory_id'));
            $hasFilters = true;
        }

        if ($request->has('location') && !is_null($request->input('location'))) {
            $location = strtoupper($request->input('location'));
            $query->whereRaw('UPPER(location) LIKE ?', ["%{$location}%"]);
            $hasFilters = true;
        }

        if ($request->has('keyword') && !is_null($request->input('keyword'))) {
            $query->where('business_title', 'like', '%' . $request->input('keyword') . '%');
            $hasFilters = true;
        }

        return $hasFilters;
    }

    public function getJsonBusinesses()
    {
        // Fetch all businesses with their related category, subcategory, and media
        $businesses = Business::with(['category', 'subcategory', 'media'])->get();

        // Iterate over each business and fetch its media


        $businesses->each(function ($business) {
            // Get media for this specific business
            $media = $business->getMedia('images')->map(function ($item) {
                $convertedUrl = $item->getPathRelativeToRoot('resized');

                // If there's no conversion, fallback to the original URL
                if (!$convertedUrl) {
                    $relativePath = 'storage/images/' . $item->id . '/' . $item->file_name;
                    $item['org_url'] = url($relativePath);
                } else {
                    $item['org_url'] = asset('/storage/images/' . $convertedUrl);
                }

                return $item->only(['org_url', 'name']);
            });

            // Attach the media to the business model
            $business->media = $media;
        });

        // Return the JSON response with the businesses and their media
        return response()->json([
            'businesses' => $businesses,
            'status' => 1,
        ], 200);
    }
}
