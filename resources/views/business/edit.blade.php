@extends('front.layouts.app')
@section('content')

<div class="mx-auto bg-white p-5 rounded-lg shadow-md container xl:container-xl my-10">
    <h3 class="text-center text-3xl p-4">Edit Business</h3>
    <form action="{{ route('business.update', $business->id) }}" id="business-form" method="POST" enctype="multipart/form-data" x-data="featuresForm()">
        @csrf
        @method('PUT') <!-- This specifies that it's a PUT request for updating -->

        <!-- Business Category -->
        <div class="mb-4 flex gap-5">
            <div class="w-1/2">
                <label for="category_id" class="block text-gray-700">Business Category</label>
                <select id="category_id" name="category_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $business->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label for="subcategory_id" class="block text-gray-700">Sub Category</label>
                <select id="subcategory_id" name="subcategory_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option value="">Select</option>
                    @foreach ($categories->where('parent_id', $business->category_id) as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $business->subcategory_id ? 'selected' : '' }}>
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
            <label for="business_title" class="block text-gray-700">Business Title</label>
            <input type="text" id="business_title" name="business_title" value="{{ $business->business_title }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Business title">
            @error('business_title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Write here...">{{ $business->description }}</textarea>
            @error('description')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Check In and Check Out -->
        <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
                <label for="check_in" class="block text-gray-700">Check In</label>
                <input type="time" id="check_in" name="check_in" value="{{ $business->check_in }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                @error('check_in')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label for="check_out" class="block text-gray-700">Check Out</label>
                <input type="time" id="check_out" name="check_out" value="{{ $business->check_out }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                @error('check_out')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Age Restriction -->
        <div class="mb-4">
            <label for="age_restriction" class="block text-gray-700">Age Restriction</label>
            <select id="age_restriction" name="age_restriction" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option value="">Select</option>
                <option value="0-17" {{ $business->age_restriction == '0-17' ? 'selected' : '' }}>0-17</option>
                <option value="18-25" {{ $business->age_restriction == '18-25' ? 'selected' : '' }}>18-25</option>
                <option value="26-40" {{ $business->age_restriction == '26-40' ? 'selected' : '' }}>26-40</option>
                <option value=">40" {{ $business->age_restriction == '>40' ? 'selected' : '' }}>&gt;40</option>
            </select>
            @error('age_restriction')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Pets Permission -->
        <div class="mb-4">
            <label for="pets_permission" class="block text-gray-700">Pets Permission</label>
            <select id="pets_permission" name="pets_permission" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option value="">Select</option>
                <option value="YES" {{ $business->pets_permission == 'YES' ? 'selected' : '' }}>YES</option>
                <option value="NO" {{ $business->pets_permission == 'NO' ? 'selected' : '' }}>NO</option>
            </select>
            @error('pets_permission')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Property Images -->
        <div class="mb-4" x-data="imageUploader()">
            <label for="images" class="block text-gray-700">
                Update property images*
                <span x-text="imageCountText" class="text-gray-500 text-sm"></span>
            </label>
            <input type="file" id="imagesInput" accept="image/*" multiple @change="handleFileUpload">
            <div id="imagePreviewContainer" class="flex flex-wrap gap-4 mt-4">
                
                {{-- @foreach ($media as $image)
                    <div class="relative inline-block">
                        <img src="{{ $image['url'] }}" class="max-w-xs max-h-48 rounded">
                        <button type="button" @click="removeFile({{ $loop->index }})" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full">Remove</button>
                    </div>
                @endforeach --}}
                <template x-for="(file, index) in files" :key="file.id">
                    <div class="relative inline-block">
                        <img :src="file.url" class="max-w-xs max-h-48 rounded">
                        <button type="button" @click="removeFile(index)" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full">Remove</button>
                    </div>
                </template>
            </div>
        </div>

        <!-- Hidden input to store files -->
        <input type="file" id="hiddenImagesInput" name="images[]" multiple style="display: none;">
        
        <!-- Property Location (Map integration) -->
        <div x-data="locationApp()" x-init="initMap">
            <div class="mb-4">
                <label for="autocomplete" class="block text-gray-700 text-sm font-bold mb-2">Property Locations</label>
                <input type="text" id="autocomplete" name="location" value="{{ $business->location }}" placeholder="Search Location" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="map" class="block text-gray-700 text-sm font-bold mb-2">Add On Map</label>
                <div id="map" class="w-full h-64 bg-gray-200 rounded"></div>
            </div>
        </div>

        <!-- Select Features Services -->
      <!-- Select Features Services -->
      <div class="mb-4">
        <label for="features-services" class="block text-gray-700">Select Features Services</label>
        <div class="flex flex-wrap gap-2">
            @foreach ($features as $feature)
                <button type="button"
                    class="px-4 py-2 border border-purple-500 rounded-full hover:bg-purple-100 focus:outline-none"
                    :class="selectedFeatures.includes({{ $feature->id }}) ? 'bg-purple-500 text-white' : 'text-purple-500'"
                    @click="toggleFeature({{ $feature->id }})">
                    {{ $feature->name }} +
                </button>
            @endforeach
        </div>
    </div>
    
    <!-- Hidden input to hold selected features -->
    <input type="hidden" name="features[]" id="features" x-model="selectedFeaturesString">
    


        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" @click="submitForm">
                Update Business
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script>
function imageUploader() {
    return {
        files: [],
        fileId: 0,
        init() {
            let x = @json($media);
            x.forEach((image, index) => {
                this.files.push({
                    id: index,
                    url: image.url,
                    name: image.name,
                    file: null // No actual file object since these are already uploaded
                });
            });
        },
        get imageCountText() {
            return `(${this.files.length}/10)`;
        },
        handleFileUpload(event) {
            const selectedFiles = Array.from(event.target.files);

            // Prevent uploading more than 10 images
            if (this.files.length + selectedFiles.length > 10) {
                alert('You can upload a maximum of 10 images.');
                return;
            }

            selectedFiles.forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const fileId = this.fileId++;
                    this.files.push({
                        id: fileId,
                        url: e.target.result,
                        name: file.name,
                        file: file
                    });

                    // Update the hidden input field with file data
                    this.updateHiddenInput();
                };
                reader.readAsDataURL(file);
            });

            // Clear the input to allow uploading the same file again
            event.target.value = '';
        },
        removeFile(index) {
            this.files.splice(index, 1);
            // Update the hidden input field after removing a file
            this.updateHiddenInput();
        },
        updateHiddenInput() {
            const dataTransfer = new DataTransfer();
            this.files.forEach(file => {
                if (file.file) {
                    dataTransfer.items.add(file.file);
                }
            });

            // Update the hidden input element
            const inputElement = document.getElementById('hiddenImagesInput');
            inputElement.files = dataTransfer.files;
        }
    };
}

function locationApp() {
    return {
        map: null,
        marker: null,
        geocoder: null,
        initMap() {
            // Initialize the map and geocoder
            this.geocoder = new google.maps.Geocoder();
            
            // Address in text format
            const initialAddress = '{{ $business->location }}'; // For example, "Azad Jammu and Kashmir"

            // Create the map with a default location
            this.map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },  // Neutral default location
                zoom: 8
            });

            // Geocode the initial address to get latitude and longitude
            this.geocodeAddress(initialAddress);
        },
        geocodeAddress(address) {
            this.geocoder.geocode({ address: address }, (results, status) => {
                if (status === 'OK') {
                    const location = results[0].geometry.location;
                    this.map.setCenter(location);  // Center the map on the geocoded location
                    this.map.setZoom(12);  // Zoom in on the location

                    // Add a marker at the geocoded location
                    this.marker = new google.maps.Marker({
                        map: this.map,
                        position: location,
                        draggable: true,  // Allow the marker to be draggable
                    });

                    // Update the location input when the marker is dragged
                    this.marker.addListener('dragend', () => {
                        const position = this.marker.getPosition();
                        this.updateLocationInput(position.lat(), position.lng());
                    });
                } else {
                    console.error('Geocode was not successful for the following reason: ' + status);
                }
            });
        },
        updateLocationInput(lat, lng) {
            console.log(`Updated location: ${lat}, ${lng}`);
            // If needed, update hidden fields with the new coordinates
            // document.getElementById('latitude').value = lat;
            // document.getElementById('longitude').value = lng;
        }
    };
}


// Load Google Maps script dynamically with async and defer
function loadGoogleMapsScript() {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
}

document.addEventListener('DOMContentLoaded', function() {
    loadGoogleMapsScript();
});

window.initMap = function() {
    locationApp().initMap();
}

function featuresForm() {
    return {
        selectedFeatures: @json($selectedFeatures), // Initialize with selected features from the backend
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('category_id');
        const subCategorySelect = document.getElementById('subcategory_id');
    
        categorySelect.addEventListener('change', function () {
            const categoryId = this.value;
    
            // Clear previous subcategories
            subCategorySelect.innerHTML = '<option value="">Select</option>';
    
            if (categoryId) {
                // Fetch subcategories for the selected category
                axios.get(`/categories/${categoryId}/subcategories`)
                    .then(response => {
                        const subcategories = response.data;
                        subcategories.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subCategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                    });
            }
        });
    });
    </script>
@endpush
