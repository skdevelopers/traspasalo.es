@extends('front.layouts.app')
@section('content')
@section('title', 'Edit Business')
@section('header-title', 'Edit Business')
@section('header-subtitle', '')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mx-auto bg-white px-4 py-10 rounded-lg shadow-md my-10">
    <form action="{{ route('business.update', $business->id) }}" id="business-form" method="POST"
        enctype="multipart/form-data" x-data="featuresForm({{ json_encode($business->features->pluck('id')) }})">
        @csrf
        @method('PUT') <!-- Method spoofing for PUT request -->

        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-2xl font-semibold mb-6 text-center">Edit Business</h3>

            <!-- Business Category -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="category_id" class="block text-base font-semibold mb-1 text-gray-700">Business
                        Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $business->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="subcategory_id" class="block text-base font-semibold mb-2 text-gray-700">Sub
                        Category</label>
                    <select id="subcategory_id" name="subcategory_id"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">Select</option>
                        <!-- Populate subcategories with the current subcategory selected -->
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ $business->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Business Title -->
            <div class="mb-4">
                <label for="business_title" class="block text-base font-semibold mb-1 text-gray-700">Business
                    Title</label>
                <input type="text" id="business_title" name="business_title"
                    value="{{ old('business_title', $business->business_title) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="Business title">
                @error('business_title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-base font-semibold mb-1 text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="Write here...">{{ old('description', $business->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Property Location -->
            <div x-data="locationApp()" x-init="initMap()" class="mb-4">
                <div class="mb-4">
                    <label for="autocomplete" class="block text-base font-semibold mb-1 text-gray-700">Property
                        Locations</label>
                    <input type="text" id="autocomplete" name="location"
                        value="{{ old('location', $business->location) }}"
                        class="w-full p-2 border border-gray-300 rounded" placeholder="Search Location">
                </div>
                <div class="mb-4">
                    <label for="map" class="block text-base font-semibold mb-1 text-gray-700">Add On Map</label>
                    <div id="map" class="w-full h-64 bg-gray-200 rounded"></div>
                </div>
            </div>

            <!-- Property Images Upload Section -->
            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
                <h3 class="text-base font-semibold mb-2 text-gray-700">Business Images</h3>
                <label for="hiddenImagesInput"
                    class="flex flex-col place-items-center place-content-center w-28 h-28 bg-gray-100 border-2 border-dashed border-gray-400 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-500 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4H5a1 1 0 100 2h4v4a1 1 0 102 0v-4h4a1 1 0 100-2h-4V5z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <input type="file" id="hiddenImagesInput" name="images[]" multiple class="hidden">
                </label>
                <div id="previewContainer" class="flex flex-wrap gap-4 mt-4">
                    @if ($business->images && $business->images->count())
                        @foreach ($business->images as $image)
                            <div class="relative group w-[118px] h-[118px]">
                                <!-- Display the image -->
                                <img src="{{ $image->url }}"
                                    class="w-[118px] h-[118px] object-cover rounded-lg border border-gray-300"
                                    alt="Business Image">

                                <!-- Optional Delete button for each image -->
                                <button type="button"
                                    class="absolute top-4 -right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center">
                                    &times;
                                </button>
                            </div>
                        @endforeach
                    @else
                        <p>No images available for this business.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Features Services Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Features Services</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($features as $feature)
                    <button type="button"
                        class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none"
                        :class="selectedFeatures.includes({{ $feature->id }}) ? 'bg-purple-500 text-white' : 'text-purple-500'"
                        @click="toggleFeature({{ $feature->id }})">
                        {{ $feature->name }} +
                    </button>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="features[]" id="features" x-model="selectedFeaturesString">

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Business
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Existing JavaScript logic for handling features, location, and image uploads remains the same

    // Load selected features when the page loads
    function featuresForm(existingFeatures = []) {
        return {
            selectedFeatures: existingFeatures,
            toggleFeature(featureId) {
                if (this.selectedFeatures.includes(featureId)) {
                    this.selectedFeatures = this.selectedFeatures.filter(id => id !== featureId);
                } else {
                    this.selectedFeatures.push(featureId);
                }
            },
            get selectedFeaturesString() {
                return this.selectedFeatures.join(',');
            }
        };
    }
</script>
@endpush
