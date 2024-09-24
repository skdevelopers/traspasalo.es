@extends('front.layouts.app')

@section('content')
@section('title', 'Edit Business')
@section('header-title', 'Edit Business')
@section('header-subtitle', '')

<div class="container mx-auto bg-white px-6 py-10 rounded-lg shadow-md my-10">
    <h3 class="text-2xl font-bold mb-6 text-center text-gray-900">Edit Business</h3>

    <form action="{{ route('business.update', $business->id) }}" id="business-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <!-- Business Category -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="category_id" class="text-lg font-semibold mb-2 text-gray-700">Business Category</label>
                    <select id="category_id" name="category_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $business->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="subcategory_id" class="text-lg font-semibold mb-2 text-gray-700">Sub Category</label>
                    <select id="subcategory_id" name="subcategory_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <!-- Loaded dynamically from JS -->
                    </select>
                    @error('subcategory_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Business Title -->
            <div class="mb-4">
                <label for="business_title" class="text-lg font-semibold mb-2 text-gray-700">Business Title</label>
                <input type="text" id="business_title" name="business_title" value="{{ old('business_title', $business->business_title) }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                @error('business_title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="text-lg font-semibold mb-2 text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">{{ old('description', $business->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Business Number -->
            <div class="mb-4">
                <label for="business_number" class="text-lg font-semibold mb-2 text-gray-700">Business Number</label>
                <input type="number" id="business_number" name="phone_no" value="{{ old('phone_no', $business->phone_no) }}" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                @error('phone_no')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Business Location -->
            <div x-data="locationApp()" x-init="initMap()" class="mb-6">
                <div class="mb-4">
                    <label for="autocomplete" class="text-lg font-semibold mb-2 text-gray-700">Business Location</label>
                    <input type="text" id="autocomplete" name="location" value="{{ old('location', $business->location) }}" placeholder="Search Location" class="w-full mt-1 p-2 border border-gray-300 rounded">
                </div>
                @error('location')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-4">
                    <label for="map" class="text-lg font-semibold mb-2 text-gray-700">Add On Map</label>
                    <div id="map" class="w-full h-64 bg-gray-200 rounded mt-1"></div>
                </div>
            </div>

            <!-- Business Images -->
            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Business Images</h3>
            
                <!-- Preview existing images with delete option -->
                <div id="existingImagesContainer" class="flex flex-wrap gap-4 mt-4">
                    @foreach ($media as $image)
                        <div class="relative w-[118px] h-[118px]" id="existingImage-{{ $image['id'] }}">
                            <img src="{{ $image['org_url'] }}" class="w-full h-full object-cover rounded-lg border border-gray-300">
                            <button type="button" class="absolute top-2 right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center"
                                onclick="markForDeletion('{{ $image['id'] }}')">&times;</button>
                            <input type="hidden" name="existing_images[]" value="{{ $image['id'] }}">
                        </div>
                    @endforeach
                </div>
            
                <!-- Preview new images with delete option -->
                <div id="previewContainer" class="flex flex-wrap gap-4 mt-4"></div>
            
                <!-- Input for adding new images -->
                <label for="hiddenImagesInput" class="flex flex-col items-center justify-center w-28 h-28 bg-gray-100 border-2 border-dashed border-gray-400 rounded-lg cursor-pointer hover:bg-gray-200 mt-4">
                    <span class="text-gray-500 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4H5a1 1 0 100 2h4v4a1 1 0 102 0v-4h4a1 1 0 100-2h-4V5z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <input type="file" id="hiddenImagesInput" name="new_images[]"  class="hidden">
                </label>
            
                <!-- Hidden input to track deleted images -->
                <input type="hidden" name="deleted_images" id="deletedImagesInput" value="">
            </div>
            

            <!-- Financials Section -->
            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Financials</h3>
                <table class="min-w-full text-sm text-left text-gray-700">
                    <tbody>
                        <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Gross Revenue</label>
                                <input type="number" name="financial[gross_revenue]" value="{{ old('financial.gross_revenue', $business->financial->gross_revenue ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">EBITDA</label>
                                <input type="number" name="financial[ebitda]" value="{{ old('financial.ebitda', $business->financial->ebitda ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Asking Price</label>
                                <input type="number" name="financial[asking_price]" value="{{ old('financial.asking_price', $business->financial->asking_price ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">FF&E</label>
                                <input type="number" name="financial[ff_and_e]" value="{{ old('financial.ff_and_e', $business->financial->ff_and_e ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Inventory</label>
                                <input type="number" name="financial[inventory]" value="{{ old('financial.inventory', $business->financial->inventory ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Established</label>
                                <input type="text" name="financial[established]" value="{{ old('financial.established', $business->financial->established ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                @error('financial.established')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Facilities Section -->
            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Facilities</h3>
                <table class="min-w-full text-left">
                    <tbody>
                        <tr class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Rent</label>
                                <input type="number" name="facility[rent]" value="{{ old('facility.rent', $business->facility->rent ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Duration (months)</label>
                                <input type="number" name="facility[duration_months]" value="{{ old('facility.duration_months', $business->facility->duration_months ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </td>
                            <td class="border px-4 py-2">
                               
                                <div class="mt-3">
                                    <label class="text-sm font-semibold mb-1 text-gray-500">Supplies</label>
                                    <div>
                                        <input type="checkbox" name="facility[rent_supplies][]" value="Air Conditioning" 
                                            {{ in_array('Air Conditioning', old('facility.rent_supplies', $business->facility->rent_supplies ?? [])) ? 'checked' : '' }}> 
                                        Air Conditioning
                                    </div>
                                    <div>
                                        <input type="checkbox" name="facility[rent_supplies][]" value="Gas" 
                                            {{ in_array('Gas', old('facility.rent_supplies', $business->facility->rent_supplies ?? [])) ? 'checked' : '' }}> 
                                        Gas
                                    </div>
                                    <div>
                                        <input type="checkbox" name="facility[rent_supplies][]" value="Electricity" 
                                            {{ in_array('Electricity', old('facility.rent_supplies', $business->facility->rent_supplies ?? [])) ? 'checked' : '' }}> 
                                        Electricity
                                    </div>
                                    <div>
                                        <input type="checkbox" name="facility[rent_supplies][]" value="3 Phase Electricity" 
                                            {{ in_array('3 Phase Electricity', old('facility.rent_supplies', $business->facility->rent_supplies ?? [])) ? 'checked' : '' }}> 
                                        3 Phase Electricity
                                    </div>
                                </div>
                                
                            </td>
                        </tr>
                        <tr class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <td class="border px-4 py-2">
                                <label for="" class="text-sm font-semibold mb-1 text-gray-500">Property (Price)</label>
                                <input type="number" name="facility[property_price]" value="{{ old('facility.property_price', $business->facility->property_price ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Property Price">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="" class="text-sm font-semibold mb-1 text-gray-500">Pending Mortgage</label>
                                <input type="number" name="facility[pending_mortgage]" value="{{ old('facility.pending_mortgage', $business->facility->pending_mortgage ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Pending Mortgage">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="" class="text-sm font-semibold mb-1 text-gray-500">State (Conditions)</label>
                                <input type="text" name="facility[state_conditions]" value="{{ old('facility.state_conditions', $business->facility->state_conditions ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter State Conditions">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="" class="text-sm font-semibold mb-1 text-gray-500">Supplies</label>
                                <select name="facility[state_supplies]" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                    <option value="">Select</option>
                                    <option value="New" {{ old('facility.state_supplies', $business->facility->state_supplies ?? '') == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Good" {{ old('facility.state_supplies', $business->facility->state_supplies ?? '') == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Used" {{ old('facility.state_supplies', $business->facility->state_supplies ?? '') == 'Used' ? 'selected' : '' }}>Used</option>
                                    <option value="Acceptable" {{ old('facility.state_supplies', $business->facility->state_supplies ?? '') == 'Acceptable' ? 'selected' : '' }}>Acceptable</option>
                                    <option value="Bad" {{ old('facility.state_supplies', $business->facility->state_supplies ?? '') == 'Bad' ? 'selected' : '' }}>Bad</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- FF&E Section -->
            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
                <table class="min-w-full text-left border-collapse">
                    <tbody>
                        <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <th colspan="3" class="text-lg font-semibold mb-2 text-gray-700">FF&E</th>
                        </tr>
                        <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <td class="border px-4 py-2">
                                <label for="price_new" class="text-sm font-semibold mb-1 text-gray-500">Price (New)</label>
                                <input type="number" name="FfAndE[price_new]" value="{{ old('FfAndE.price_new', $business->ffAndE->price_new ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Price">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="pending_payments" class="text-sm font-semibold mb-1 text-gray-500">Pending Payments</label>
                                <input type="number" name="FfAndE[pending_payments]" value="{{ old('FfAndE.pending_payments', $business->ffAndE->pending_payments ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Pending Payments">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="year" class="text-sm font-semibold mb-1 text-gray-500">Year</label>
                                <input type="number" name="FfAndE[year]" value="{{ old('FfAndE.year', $business->ffAndE->year ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Year">
                                @error('FfAndE.year')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            </td>
                        </tr>

                        <!-- Vehicles Section -->
                        <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <th colspan="3" class="text-lg font-semibold mb-2 text-gray-700 mt-5">Vehicles</th>
                        </tr>
                        <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <td class="border px-4 py-2">
                                <label for="make_model" class="text-sm font-semibold mb-1 text-gray-500">Make and Model</label>
                                <input type="text" name="vehicle[make_and_model]" value="{{ old('vehicle.make_and_model', $business->vehicle->make_and_model ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Make and Model">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="vehicle_year" class="text-sm font-semibold mb-1 text-gray-500">Year</label>
                                <input type="number" name="vehicle[year]" value="{{ old('vehicle.year', $business->vehicle->year ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Year">
                                @error('vehicle.year')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            </td>

                            <td class="border px-4 py-2">
                                <label for="km" class="text-sm font-semibold mb-1 text-gray-500">Km</label>
                                <input type="number" name="vehicle[km]" value="{{ old('vehicle.km', $business->vehicle->km ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Km">
                            </td>
                        </tr>

                        <!-- Employees Section -->
                        <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <th colspan="2" class="text-lg font-semibold mb-2 text-gray-700 mt-5">Employees</th>
                        </tr>
                        <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <td class="border px-4 py-2">
                                <label for="number_employees" class="text-sm font-semibold mb-1 text-gray-500">Number of employees</label>
                                <input type="number" name="business_employee[number_of_employees]" value="{{ old('business_employee.number_of_employees', $business->businessEmployee->number_of_employees ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Number of Employees">
                            </td>
                            <td class="border px-4 py-2">
                                <label for="employee_cost" class="text-sm font-semibold mb-1 text-gray-500">Employee cost (company cost)</label>
                                <input type="number" name="business_employee[employee_cost]" value="{{ old('business_employee.employee_cost', $business->businessEmployee->employee_cost ?? '') }}" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter Employee Cost">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Business
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function locationApp() {
    return {
        initMap() {
            const locationText = "{{ old('location', $business->location) }}"; // Get the location in text format

            if (typeof google !== 'undefined' && google.maps) {
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: { lat: -34.397, lng: 150.644 }, // Default center, will be updated
                });

                const input = document.getElementById('autocomplete');
                const autocomplete = new google.maps.places.Autocomplete(input);

                const geocoder = new google.maps.Geocoder();

                // Geocode the saved location (text format) to center the map
                if (locationText) {
                    geocodeLocation(locationText, geocoder, map);
                }

                autocomplete.addListener('place_changed', function () {
                    const place = autocomplete.getPlace();
                    if (!place.geometry) return;

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }

                    new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                    });
                });
            } else {
                console.error('Google Maps API is not loaded.');
            }
        },
    };
}

// Function to geocode the location text and center the map
function geocodeLocation(location, geocoder, map) {
    geocoder.geocode({ address: location }, function (results, status) {
        if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
            });
        } else {
            console.error('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function loadGoogleMapsScript(callback) {
    const existingScript = document.querySelector('script[src*="maps.googleapis.com"]');
    if (existingScript) {
        callback();
        return;
    }

    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);

    script.onload = callback;
}

window.initMap = function () {
    locationApp().initMap();
};

document.addEventListener('DOMContentLoaded', function () {
    loadGoogleMapsScript(function () {
        if (window.Alpine) {
            locationApp().initMap();
        } else {
            document.addEventListener('alpine:init', () => {
                locationApp().initMap();
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('category_id');
    const subCategorySelect = document.getElementById('subcategory_id');
    const savedSubCategoryId = "{{ old('subcategory_id', $business->subcategory_id) }}"; // Assuming you have the subcategory_id saved

    // On category change, load subcategories
    categorySelect.addEventListener('change', function () {
        const categoryId = this.value;
        subCategorySelect.innerHTML = '<option value="">Select</option>';

        if (categoryId) {
            axios.get(`/categories/${categoryId}/subcategories`)
                .then(response => {
                    const subcategories = response.data;
                    subcategories.forEach(subcategory => {
                        const option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;

                        // If this subcategory is the saved one, mark it as selected
                        if (subcategory.id == savedSubCategoryId) {
                            option.selected = true;
                        }

                        subCategorySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching subcategories:', error);
                });
        }
    });

    // Trigger the change event when the page loads to pre-fill subcategories if the category is already selected
    if (categorySelect.value) {
        categorySelect.dispatchEvent(new Event('change'));
    }
});


let deletedImages = [];

// Handle new image preview and deletion
document.getElementById('hiddenImagesInput').addEventListener('change', function(event) {
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = ''; // Clear previous previews

    const files = event.target.files;
    if (files) {
        Array.from(files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('relative', 'group', 'w-[118px]', 'h-[118px]');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Uploaded Image';
                img.classList.add('w-[118px]', 'h-[118px]', 'object-cover', 'rounded-lg', 'border', 'border-gray-300');

                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = '&times;';
                deleteButton.classList.add('absolute', 'top-4', '-right-2', 'text-white', 'bg-red-500', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'opacity-0', 'group-hover:opacity-100', 'transition-opacity', 'duration-300');

                deleteButton.addEventListener('click', function() {
                    wrapper.remove();
                });

                wrapper.appendChild(img);
                wrapper.appendChild(deleteButton);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
});

// Handle deletion of existing images
function markForDeletion(imageId) {
    deletedImages.push(imageId);
    document.getElementById('deletedImagesInput').value = deletedImages.join(',');

    // Remove the image from the DOM
    document.getElementById('existingImage-' + imageId).remove();
}

</script>
@endpush
